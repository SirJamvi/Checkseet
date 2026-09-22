<?php

namespace App\Controllers;

class Cleansing extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // 1. Tarik Kamus Suci (Semua mesin master dari database)
        $masterMachines = $db->table('machine_list')->get()->getResult();
        
        $html = "<html><head><title>Preview All Device Cleansing</title>";
        $html .= "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'></head>";
        $html .= "<body class='p-4'>";
        $html .= "<h3 class='mb-3'>Mode Simulasi: Penyelarasan GLOBAL Tabel STARTUP</h3>";
        $html .= "<p>Sistem ini mencocokkan otomatis seluruh anomali <b>machno</b> dari semua proses dengan tabel <b>machine_list</b>. Data di bawah ini BELUM diubah di database.</p>";
        
        $html .= "<table class='table table-bordered table-sm table-striped'><thead><tr class='table-warning'>";
        $html .= "<th>ID Data</th><th>Process</th><th>Machno (Data Mentah)</th><th>Machno (Akan Diselaraskan)</th>";
        $html .= "</tr></thead><tbody>";
        
        $count = 0;

        // 2. Tarik seluruh data di tabel startup
        $query = $db->table('startup')->get();
        
        foreach ($query->getResult() as $row) {
            $original = $row->machno;
            
            // Ekstrak nama device dari kolom process (Contoh: "fl18-s-db2" -> dapet "fl18")
            $device = '';
            $processParts = explode('-', $row->process);
            if (count($processParts) > 0) {
                $device = $processParts[0];
            }
            
            // Cocokkan data asli dengan kamus master
            $cleaned = $this->matchMachine($original, $device, $masterMachines);
            
            // Jika hasil pembersihan berbeda dengan data asli, tampilkan di tabel
            if ($original !== $cleaned) {
                $count++;
                $html .= "<tr>";
                $html .= "<td>{$row->id}</td>";
                $html .= "<td>{$row->process}</td>";
                $html .= "<td class='text-danger'>'{$original}'</td>";
                $html .= "<td class='text-success font-weight-bold'>'{$cleaned}'</td>";
                $html .= "</tr>";
            }
        }
        
        $html .= "</tbody></table>";
        
        if ($count > 0) {
            $html .= "<div class='mt-4 p-3 bg-light border rounded'>";
            $html .= "<form method='post' action='" . base_url('cleansing/execute') . "'>";
            $html .= "<h5>Pola Global Terdeteksi!</h5>";
            $html .= "<p>Klik tombol di bawah untuk menyelaraskan semua data di atas secara permanen ke database.</p>";
            $html .= "<button type='submit' class='btn btn-danger btn-lg' onclick=\"return confirm('Yakin eksekusi {$count} data ke database?');\">EKSEKUSI UPDATE KE TABEL STARTUP</button>";
            $html .= "</form></div>";
        } else {
            $html .= "<div class='alert alert-success mt-4'>Luar Biasa! Seluruh machno di tabel STARTUP sudah selaras 100% dengan machine_list.</div>";
        }
        
        $html .= "</body></html>";
        
        return $html;
    }

    public function execute()
    {
        $db = \Config\Database::connect();
        $masterMachines = $db->table('machine_list')->get()->getResult();
        $count = 0;

        $query = $db->table('startup')->get();
        
        foreach ($query->getResult() as $row) {
            $original = $row->machno;
            
            $device = '';
            $processParts = explode('-', $row->process);
            if (count($processParts) > 0) {
                $device = $processParts[0];
            }
            
            $cleaned = $this->matchMachine($original, $device, $masterMachines);
            
            if ($original !== $cleaned) {
                // Tembak update langsung ke database (Hanya tabel startup)
                $db->table('startup')->where('id', $row->id)->update(['machno' => $cleaned]);
                $count++;
            }
        }

        $html = "<html><head><title>Sukses Eksekusi</title>";
        $html .= "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'></head>";
        $html .= "<body class='p-5 text-center'>";
        $html .= "<h1 class='text-success'>EKSEKUSI GLOBAL SELESAI!</h1>";
        $html .= "<h4><b>{$count} data anomali di seluruh tabel STARTUP</b> berhasil diselaraskan dengan master machine_list.</h4>";
        $html .= "<a href='" . base_url('cleansing') . "' class='btn btn-primary mt-3'>Cek Ulang Data</a>";
        $html .= "</body></html>";

        return $html;
    }

    // FUNGSI PINTAR DYNAMIC FUZZY MATCHING (Berlaku untuk semua mesin!)
    private function matchMachine($raw, $device, $masterMachines) 
    {
        if (empty($raw) || $raw === '-' || $raw === 'null') return $raw;

        // 1. Bersihkan raw input (Hanya sisa huruf dan angka)
        $rawClean = strtoupper(preg_replace('/[^A-Z0-9]/', '', $raw));
        
        // 2. Ekstrak angka murni dari raw input (Misal "D2.14" -> "214")
        preg_match_all('/\d+/', $raw, $rawMatches);
        $rawNums = implode('', $rawMatches[0]);

        $candidates = [];

        foreach ($masterMachines as $master) {
            // Hanya cocokkan dengan mesin yang berada di device yang sama (misal fl18 dengan fl18)
            $masterDevice = explode('-', $master->process_code)[0];
            if (strtolower($masterDevice) !== strtolower($device)) {
                continue;
            }

            $masterName = $master->machine_name;
            $masterClean = strtoupper(preg_replace('/[^A-Z0-9]/', '', $masterName));
            
            preg_match_all('/\d+/', $masterName, $masterMatches);
            $masterNums = implode('', $masterMatches[0]);

            // KONDISI 1: Jika setelah dihilangkan spasi/simbol huruf & angkanya 100% sama
            // Contoh: Raw = "FFDB2_7", Master = "FFDB 2.7" -> Clean-nya sama-sama "FFDB27"
            if ($rawClean === $masterClean) {
                return $masterName;
            }

            // KONDISI 2: Jika Raw Input adalah bagian dari Master Clean
            // Contoh: Raw = "D214", Master = "FFDB214".
            if (strlen($rawClean) >= 3 && strpos($masterClean, $rawClean) !== false) {
                return $masterName;
            }

            // KONDISI 3: Jika angkanya sama persis (Tanpa mempedulikan huruf)
            // Contoh: Raw "2.12" (Angka: 212), Master "FFDB 2.12" (Angka: 212)
            if ($rawNums !== '' && $rawNums === $masterNums) {
                $candidates[] = $masterName;
            }
        }

        // Jika kondisi 3 menemukan tepat 1 kecocokan angka, pakai itu!
        if (count($candidates) === 1) {
            return $candidates[0];
        }

        // Jika tidak ketemu atau ketemu lebih dari satu (membingungkan), biarkan data aslinya
        return $raw;
    }
}