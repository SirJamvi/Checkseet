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
    
    // Originator (Data yang saya ambil dari file SQL Anda sebelumnya)
    ['username' => '002260', 'name' => 'Dona Alatiful Chobir', 'email' => 'dona.alatifulchobir@fti-foxconn.com', 'password' => '002260', 'section' => 'Engineering Section', 'state' => 'Originator', 'level' => 2],
    
    // Admin (Bypass bawaan CodeIgniter)
    ['username' => 'admin', 'name' => 'Administrator', 'email' => 'admin@fti-foxconn.com', 'password' => 'admin', 'section' => 'Engineering Section', 'state' => 'Admin', 'level' => 8],
];

        // Insert data ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}