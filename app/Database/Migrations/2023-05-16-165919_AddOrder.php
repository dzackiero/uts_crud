<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'is_sales' => [
                'type'           => 'BOOLEAN'
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'quantity' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],


        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
