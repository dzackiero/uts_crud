<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view("pages/admin/home");
    }

    public function employees()
    {
        return view("pages/admin/table",[
            'data' => "karyawan",
            'model' => 'model'
        ]);
    }

    public function customers()
    {
        return view("pages/admin/table",[
            'data' => "pelanggan",
            'model' => 'model'
        ]);
    }

    public function products()
    {
        return view("pages/admin/table",[
            'data' => "produk",
            'model' => 'model'
        ]);
    }

    public function categories()
    {
        return view("pages/admin/table",[
            'data' => "kategori",
            'model' => 'model'
        ]);
    }

    public function transactions()
    {
        return view("pages/admin/table",[
            'data' => "transaction",
            'model' => 'model'
        ]);
    }
}
