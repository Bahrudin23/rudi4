<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenulisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'address'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'phone'      => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('penulis');
    }

    public function down()
    {
        $this->forge->dropTable('penulis');
    }
}
