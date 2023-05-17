<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProducts extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 120,
            ],
            'price' => [
                'type'       => 'INT',
                'constraint' => 120,
                'unsigned' => true,
            ],
            'stock' => [
                'type'       => 'INT',
                'constraint' => 120,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->createTable('products');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 120,
            ],
            'item_price' => [
                'type'       => 'INT',
                'constraint' => 120,
                'unsigned' => true,
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 120,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('order_id', 'orders', 'id');
        $this->forge->createTable('order_items');
    }

    public function down()
    {
        //
    }
}
