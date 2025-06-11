<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailPhoneToPenulis extends Migration
{
    public function up()
    {
        $this->forge->addColumn('penulis', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'after'      => 'address',
                'null'       => true
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'after'      => 'email',
                'null'       => true
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('penulis', ['email', 'phone']);
    }
}
