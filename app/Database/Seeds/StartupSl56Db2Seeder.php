<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StartupSl56Db2Seeder extends Seeder
{
    public function run()
    {
        $table   = 'startup';
        $device  = 'sl56';
        $process = 'sl56-s-db2'; // sudah terdaftar di tabel `proses`, aman untuk FK

        // ========================================================
        // Rentang tanggal dummy data
        // ========================================================
        $startDate = new \DateTime('2026-08-01 08:00:00');
        $endDate   = new \DateTime('2026-09-30 08:00:00');

        // Mesin fisik yang dipakai proses db2 (diambil dari machine_list: sl56-p-db2)
        $machines = ['SLD 2-1', 'SLD 2-3', 'SLD 2-4', 'SLD 2-6'];

        // Operator dummy (empid + nama). Silakan ganti dengan data pegawai asli jika perlu.
        $operators = [
            ['empid' => '100231', 'name' => 'Rudi Hartono'],
            ['empid' => '100455', 'name' => 'Dewi Lestari'],
            ['empid' => '100678', 'name' => 'Agus Setiawan'],
        ];

        $groups = ['A', 'B', 'C'];
        $shifts = ['Shift 1', 'Shift 2', 'Shift 3'];

        // Skenario approval: status + siapa yang approve + role
        $scenarios = [
            ['status' => 'Approved', 'role' => 'Supervisor', 'foreman' => null, 'leader' => null, 'supervisor' => 'Budi Santoso'],
            ['status' => 'Approved', 'role' => 'Leader',     'foreman' => null, 'leader' => 'Andi Wijaya', 'supervisor' => null],
            ['status' => 'Bypass',   'role' => 'Foreman',    'foreman' => 'Siti Aminah', 'leader' => null, 'supervisor' => null],
            ['status' => 'Pending',  'role' => null,         'foreman' => null, 'leader' => null, 'supervisor' => null],
        ];

        // Item yang sifatnya checklist OK/NG (sesuai urutan form: item 4,5,7,9,10,11)
        $checklistPar = [11, 12, 13, 14, 17, 24, 26, 27, 28];

        // Rentang standar numerik per parameter, sesuai kolom "Standard" di form
        $ranges = [
            1  => [340, 490],   // Transfer Air Pressure A (MPa)
            2  => [0.34, 0.49], // Transfer Air Pressure B (MPa)
            3  => [60, 150],    // Chip-clean A
            4  => [0.06, 0.150],
            5  => [340, 490],   // Stem A
            6  => [0.340, 0.490],
            7  => [-95, -80],   // Vacuum Chip A (<= -80 kPa)
            8  => [-95, -80],
            9  => [-85, -70],   // Vacuum Stem A (<= -70 kPa)
            10 => [-85, -70],
            15 => [0.60, 1.00], // Collet load A (N)
            16 => [0.60, 1.00],
            18 => [0.01, 0.10], // Air pressure analog
            19 => [0.005, 0.10],
            20 => [0.01, 0.15], // Dispense time analog
            21 => [0.005, 0.15],
            22 => [-0.30, 0.10], // Suction pressure analog
            23 => [-0.30, 0.10],
            25 => [1, 5],        // Quantity Ag Paste
            29 => [0.2, 0.6],    // Needle push up level
        ];

        $rows    = [];
        $number  = 1;
        $current = clone $startDate;

        while ($current <= $endDate) {
            $date     = $current->format('Y-m-d H:i:s');
            $scenario = $scenarios[array_rand($scenarios)];
            $operator = $operators[array_rand($operators)];

            $row = [
                'number'     => $number,
                'device'     => $device,
                'process'    => $process,
                'model'      => null,
                'lotno'      => null,
                'machno'     => $machines[array_rand($machines)],
                'empid'      => $operator['empid'],
                'group'      => $groups[array_rand($groups)],
                'shift'      => $shifts[array_rand($shifts)],
                'name'       => $operator['name'],
                'par000'     => $number,
            ];

            // par001 - par030 (dipakai form LD Die Bonding 2)
            for ($p = 1; $p <= 30; $p++) {
                $key = 'par' . str_pad($p, 3, '0', STR_PAD_LEFT);

                if (in_array($p, $checklistPar, true)) {
                    $row[$key] = (mt_rand(0, 9) > 0) ? 'OK' : 'NG'; // ~90% OK
                } elseif ($p === 30) {
                    $row[$key] = 'Kondisi mesin normal';           // Note
                } elseif (isset($ranges[$p])) {
                    [$min, $max] = $ranges[$p];
                    $isDecimal = is_float($min) || is_float($max);
                    $row[$key] = $isDecimal
                        ? round(mt_rand($min * 1000, $max * 1000) / 1000, 3)
                        : mt_rand((int) $min, (int) $max);
                } else {
                    $row[$key] = 'OK';
                }
            }

            // par031 - par044 tidak dipakai form ini
            for ($p = 31; $p <= 44; $p++) {
                $key = 'par' . str_pad($p, 3, '0', STR_PAD_LEFT);
                $row[$key] = null;
            }

            $row['status']     = $scenario['status'];
            $row['role']       = $scenario['role'];
            $row['foreman']    = $scenario['foreman'];
            $row['leader']     = $scenario['leader'];
            $row['supervisor'] = $scenario['supervisor'];

            $row['created_at'] = $date;
            $row['updated_at'] = $date;
            $row['deleted_at'] = '0000-00-00 00:00:00'; // kolom NOT NULL tanpa default

            $rows[] = $row;

            // Insert per-batch 30 baris supaya query tidak terlalu besar sekali jalan
            if (count($rows) >= 30) {
                $this->db->table($table)->insertBatch($rows);
                $rows = [];
            }

            $number++;
            $current->modify('+1 day');
        }

        // Insert sisa baris yang belum ke-flush
        if (! empty($rows)) {
            $this->db->table($table)->insertBatch($rows);
        }

        echo "Selesai. Total baris ditambahkan ke tabel `startup`: " . ($number - 1) . "\n";
    }
}