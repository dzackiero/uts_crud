<?php

namespace App\Database\Seeds;

use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        helper('date');

        $productModel = new ProductModel();


        $data = [
            [
                'user_id' => 3,
                'is_sales' => true,
                'status' => "success",
                'address' => "villa 5",
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ]
        ];

        foreach($data as $row){
            $this->db->table('orders')->insert([
                "user_id" => $row['user_id'],
                "status" => $row['status'],
                "is_sales" => $row['is_sales'],
                "address" => $row['address'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at'],
            ]);
        }
        
        
        $data = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'item_price' => $productModel->find(1)['price'],
                'quantity' => random_int(1,4),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'item_price' => $productModel->find(2)['price'],
                'quantity' => random_int(1,4),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
        ];

        foreach($data as $row){
            $this->db->table('order_items')->insert([
                'order_id' => $row['order_id'],
                'product_id' => $row['product_id'],
                'item_price' => $row['item_price'],
                'quantity' => $row['quantity'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ]);
        }
    }
}
