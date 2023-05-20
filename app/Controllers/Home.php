<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $helpers = ['user'];

    public function index()
    {

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->select('id,name')->findAll();

        return view('pages/home', [
            "categories" => $categories,
            "products" => [1,2,3,4,5] // Dummy Data
        ]);
    }
    
}
