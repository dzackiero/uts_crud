<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $seeder = \Config\Database::seeder();
        $seeder->call('UserSeeder');
        $seeder->call('ProductSeeder');
        $seeder->call('ordersSeeder');
    }
}
