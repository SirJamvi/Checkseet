<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MachineListSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --- FRAME LASER DB1 (fl18-p-db1) - dari PM-FFD1-001 rev2 ---
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.1'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.2'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.3'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.4'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.5'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.6'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.7'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.8'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.9'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.10'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.11'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.12'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.13'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.14'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.15'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.16'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.17'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.18'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.19'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.20'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.21'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.22'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.23'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.24'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.25'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.26'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.27'],
            ['process_code' => 'fl18-p-db1', 'machine_name' => 'FFDB 1.28'],

            // --- FRAME LASER DB2 (fl18-p-db2) - dari PM-FFD2-001 rev2 ---
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.1'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.2'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.3'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.4'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.5'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.6'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.7'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.8'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.9'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.10'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.11'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.12'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.13'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.14'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.15'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.16'],
            ['process_code' => 'fl18-p-db2', 'machine_name' => 'FFDB 2.17'],

            // --- SINGLE LASER DB1 (sl56-p-db1) - dari PM-EGD1-001 rev1 ---
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SDB1-4'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-1'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-2'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-3'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-4'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-9'],
            ['process_code' => 'sl56-p-db1', 'machine_name' => 'SLD1-10'],

            // --- SINGLE LASER DB2 (sl56-p-db2) - dari PM-SLD2-001 rev1 ---
            ['process_code' => 'sl56-p-db2', 'machine_name' => 'SLD 2-1'],
            ['process_code' => 'sl56-p-db2', 'machine_name' => 'SLD 2-3'],
            ['process_code' => 'sl56-p-db2', 'machine_name' => 'SLD 2-4'],
            ['process_code' => 'sl56-p-db2', 'machine_name' => 'SLD 2-6'],
        ];

        // Kosongkan tabel dulu agar tidak duplikat jika dijalankan ulang
        $this->db->table('machine_list')->truncate();

        // Insert batch
        $this->db->table('machine_list')->insertBatch($data);
    }
}