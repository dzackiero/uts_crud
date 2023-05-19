<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        helper('date');

        $data = ['Super Admin', 'Admin', 'User'];

        foreach ($data as $role) {
            $this->db->table('roles')->insert([
                'name' => $role
            ]);
        }

        $data = [
            [
                'name' => 'Mas Super',
                'phone' => '085156029415',
                'role' => 1,
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
            [
                'name' => 'Mas Admin',
                'phone' => '085156029415',
                'role' => 2,
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ],
            [
                'name' => 'Mas User',
                'phone' => '085156029415',
                'role' => 3,
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s', now()),
                'updated_at' => date('Y-m-d H:i:s', now()),
            ]
        ];

        foreach($data as $user){
            $this->db->table('users')->insert([
                'name' => $user['name'],
                'phone' => $user['phone'],
                'email' => $user['email'],
                'role' => $user['role'],
                'password' => $user['password'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at']
            ]);
        }
    }
}
