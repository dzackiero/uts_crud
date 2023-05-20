<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class Product extends BaseController
{

    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->orderBy('created_at','')->findAll();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $idCategories = [];
        foreach ($categories as $category) {
            $idCategories[$category['id']] = $category['name'];
        }

        return view("pages/admin/product/index",[
            'products' => $products,
            'categories' => $idCategories,
        ]);
    }


    public function create()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        
        return view("pages/admin/product/form", [
            'categories' => $categories,
            'title' => "Tambah Produk",
            'method' => '/admin/products/store',
        ]);
    }

    public function store()
    {
        $data = $this->request->getVar();
        $image = $this->request->getFile("sampul");
        $imageName = str_replace(' ', '-',$data['name']) . '-' .str_replace(' ', '-',$data['category']);

        if($image->move('img', $imageName)){
            $imageName = "/img/$imageName";
        }

        $this->productModel->insert([
            'name' => $data['name'],
            'price' => $data['price'],
            'cost' => $data['cost'],
            'stock' => $data['stock'],
            'description' => $data['description'],
            'image' => $imageName,
            'category_id' => $data['category'],
        ]);
        
        return redirect()->to(url_to('products'));
    }

    public function get(int $id)
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $product = $this->productModel->find($id);
        return view('/pages/admin/product/form', [
            'title' => 'Edit Produk',
            'product' =>  $product,
            'categories' => $categories,
            'method' => "/admin/products/$id/update",
        ]);
    }


    public function update(int $id)
    {
        $data = $this->request->getVar();
        $image = $this->request->getFile("sampul");
        $imageName = str_replace(' ', '-',$data['name']) . '-' .str_replace(' ', '-',$data['category']);

        if($image->move('img', $imageName)){
            $imageName = "/img/$imageName";
        }
        $this->productModel->update($id,[
            'name' => $data['name'],
            'price' => $data['price'],
            'cost' => $data['cost'],
            'stock' => $data['stock'],
            'description' => $data['description'],
            'image' => $imageName,
            'category_id' => $data['category'],
        ]);
        
        return redirect()->to(url_to('products'));
    }

    public function delete(int $id)
    {
        $this->productModel->delete($id);

        return redirect()->to(url_to('products'));
    }
}
