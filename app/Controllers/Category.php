<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();

        return view("pages/admin/category/index",[
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view("pages/admin/category/form", [
            'title' => "Tambah Kategori",
            'method' => '/admin/categories/store',
        ]);
    }

    public function store()
    {
        $data = $this->request->getVar();
        $this->categoryModel->insert([
            'name' => $data['name'],
        ]);
        
        return redirect()->to(url_to('categories'));
    }

    public function get(int $id)
    {
        $category = $this->categoryModel->find($id);
        return view('/pages/admin/category/form', [
            'title' => 'Edit Produk',
            'category' => $category,            
            'method' => "/admin/categories/$id/update",
        ]);
    }


    public function update(int $id)
    {
        $data = $this->request->getVar();
        $this->categoryModel->update($id,[
            'name' => $data['name'],
        ]);
        
        return redirect()->to(url_to('categories'));
    }

    public function delete(int $id)
    {
        $this->categoryModel->delete($id);

        return redirect()->to(url_to('categories'));
    }




}
