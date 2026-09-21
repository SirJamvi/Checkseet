<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Approver
            ['username' => '001946', 'name' => 'Iwan Martanto', 'email' => 'iwan.martanto@fti-foxconn.com', 'password' => '001946', 'section' => 'Engineering Section', 'state' => 'Approver', 'level' => 7],
            
            // Originator (Operator)
            ['username' => '002260', 'name' => 'Dona Alatiful Chobir', 'email' => 'dona.alatifulchobir@fti-foxconn.com', 'password' => '002260', 'section' => 'Engineering Section', 'state' => 'Originator', 'level' => 2],
            
            // Admin 
            ['username' => 'admin', 'name' => 'Administrator', 'email' => 'admin@fti-foxconn.com', 'password' => 'admin', 'section' => 'Engineering Section', 'state' => 'Admin', 'level' => 8],
        ];

        // Mencegah duplikasi saat seeder dijalankan berulang
        $this->db->table('users')->emptyTable();
        $this->db->table('users')->insertBatch($data);
    }
}