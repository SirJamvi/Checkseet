<?php

namespace App\Models;

use CodeIgniter\Model;

class MachineModel extends Model
{
    protected $table            = 'machine_list';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['process_code', 'machine_name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Ambil daftar mesin berdasarkan process_code.
     *
     * 1) Cek dulu di `machine_list` untuk process_code persis ini.
     * 2) Jika kosong -- ini terjadi karena `machine_list` saat ini hanya
     *    diisi untuk sebagian process_code fisik yang sama (misal hanya
     *    untuk versi 'production', sedangkan versi 'startup'/'foregoing'
     *    untuk mesin fisik yang SAMA belum diisi) -- cari process_code
     *    "saudara" di device yang sama dengan nama proses yang sama
     *    (setelah dinormalisasi), lalu ambil machine_list dari sana.
     *
     * CATATAN: Ini TIDAK fallback ke data histori mentah (tabel
     * startup/production/foregoing) karena data machno di sana masih
     * banyak typo/format tidak konsisten (lihat fitur Cleansing).
     * Menampilkan data mentah itu ke dropdown Input hanya akan
     * mewariskan typo lama ke data baru.
     */
    public function getMachineByProcess($processCode)
    {
        $processCode = trim($processCode);

        $machines = $this->where('process_code', $processCode)->findAll();

        if (!empty($machines)) {
            return $machines;
        }

        return $this->getMachineFromSiblingProcess($processCode);
    }

    protected function getMachineFromSiblingProcess(string $processCode): array
    {
        $db = \Config\Database::connect();

        $current = $db->table('proses')
            ->where('process_code', $processCode)
            ->get()
            ->getRowArray();

        if (!$current || empty($current['device']) || empty($current['name'])) {
            return [];
        }

        $targetName = $this->normalizeProcessName($current['name']);

        // Ambil semua proses lain di device yang sama (selain dirinya sendiri)
        $siblings = $db->table('proses')
            ->select('process_code, name')
            ->where('device', $current['device'])
            ->where('process_code !=', $processCode)
            ->get()
            ->getResultArray();

        $exactMatches = [];
        $fuzzyMatches = [];

        foreach ($siblings as $sibling) {
            $siblingName = $this->normalizeProcessName($sibling['name']);

            if ($siblingName === $targetName) {
                $exactMatches[] = $sibling['process_code'];
            } elseif ($targetName !== '' && $siblingName !== '' &&
                (str_contains($siblingName, $targetName) || str_contains($targetName, $siblingName))
            ) {
                $fuzzyMatches[] = $sibling['process_code'];
            }
        }

        // Prioritaskan proses yang namanya persis sama setelah dinormalisasi.
        // Baru kalau tidak ada, coba yang mirip (fuzzy contains).
        $candidateCodes = !empty($exactMatches) ? $exactMatches : $fuzzyMatches;

        if (empty($candidateCodes)) {
            return [];
        }

        $result = $this->whereIn('process_code', $candidateCodes)->findAll();

        // Hilangkan duplikat machine_name (kalau lebih dari 1 sibling match)
        $seen = [];
        $unique = [];
        foreach ($result as $row) {
            $key = strtoupper(trim($row['machine_name']));
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $unique[] = $row;
            }
        }

        return $unique;
    }

    /**
     * Normalisasi nama proses supaya "LD Die Bonding 2" dan
     * "LD Die Bonding 2 Machine" dianggap sama. Menghapus akhiran umum
     * seperti "Machine", "Auto Machine", "Manual Machine", dan
     * merapikan spasi/kapitalisasi.
     */
    protected function normalizeProcessName(string $name): string
    {
        $name = trim($name);
        $name = preg_replace('/\s+/', ' ', $name);
        $name = preg_replace('/\s+(auto\s+|manual\s+)?machine$/i', '', $name);
        return strtolower(trim($name));
    }

    public function getMachineByProcessRaw($processCode)
    {
        return $this->where('process_code', trim($processCode))->findAll();
    }
}