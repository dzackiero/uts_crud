<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        $data = ['Super Admin', 'Admin', 'User'];

        foreach ($data as $role) {
            $this->db->table('roles')->insert([
                'name' => $role
            ]);
        }

        $data = [
            [
                'username' => 'admin',
                'role' => 1,
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ]
        ];

        foreach($data as $user){
            $this->db->table('users')->insert([
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'],
                'password' => $user['password'],
            ]);
        }
    }
}
