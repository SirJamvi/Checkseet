<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMachineListTable extends Migration
{
    public function up()
    {
        // Mendefinisikan struktur kolom tabel machine_list
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'process_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'machine_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Menjadikan kolom 'id' sebagai Primary Key
        $this->forge->addKey('id', true);
        
        // Menambahkan Index pada process_code agar pencarian mesin berdasarkan proses lebih cepat
        $this->forge->addKey('process_code');

        // Membuat tabel
        $this->forge->createTable('machine_list');
    }

    public function down()
    {
        // Menghapus tabel jika perintah `php spark migrate:rollback` dijalankan
        $this->forge->dropTable('machine_list');
    }
}