<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        

        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ]
        ];

        foreach($data as $user){
            $this->db->table('users')->insert([
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
