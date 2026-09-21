<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRevisiAndBerlakuToProses extends Migration
{
    public function up()
    {
        $fields = [
            'revisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
                'after'      => 'docno',
            ],
            'berlaku' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'revisi',
            ],
        ];

        $this->forge->addColumn('proses', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('proses', ['revisi', 'berlaku']);
    }
}