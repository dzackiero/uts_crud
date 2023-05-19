<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    

    public function run()
    {
        helper('date');
        
        // Categories
        $data = [
            [
                "name" => "CPU",
                "created_at" => date('Y-m-d H:i:s', now()),
                "updated_at" => date('Y-m-d H:i:s', now()),
            ],
            [
                "name" => "Graphics Card",
                "created_at" => date('Y-m-d H:i:s', now()),
                "updated_at" => date('Y-m-d H:i:s', now()),
            ],
            [
                "name" => "Cooling",
                "created_at" => date('Y-m-d H:i:s', now()),
                "updated_at" => date('Y-m-d H:i:s', now()),
            ],
            [
                "name" => "Power",
                "created_at" => date('Y-m-d H:i:s', now()),
                "updated_at" => date('Y-m-d H:i:s', now()),
            ],
        ];

        foreach ($data as $category) {
            $this->db->table('categories')->insert($category);
        }

        // Product
        $data =  [
            [
                'category_id' => random_int(1, 4),
                'name' => "Ryzen 5 5500",
                'price' => random_int(5000, 10000),
                'cost' => random_int(1000, 4000),
                'stock' => random_int(5,10),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
            [
                'category_id' => random_int(1, 4),
                'name' => "Product 2",
                'price' => random_int(5000, 10000),
                'cost' => random_int(1000, 4000),
                'stock' => random_int(5,10),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
            [
                'category_id' => random_int(1, 4),
                'name' => "Product 3",
                'price' => random_int(5000, 10000),
                'cost' => random_int(1000, 4000),
                'stock' => random_int(5,10),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
        ];
        
        foreach ($data as $product) {
            $this->db->table('products')->insert($product);
        }
    }
}
