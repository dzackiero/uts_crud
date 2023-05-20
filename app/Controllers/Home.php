<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $helpers = ['user'];
    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $categories;
    protected $cart;

    public function __construct()
    {
        helper('user');

        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->categories = $this->categoryModel->select('id,name')->findAll();

        if (isLogin()) {
            $cart = $this->orderModel->where('user_id',getId())->where('status', 'pending')->first();
            $this->cart = sizeof($cart) > 0 ? $cart : null;
        }

        if($this->cart != null){
            $orderItemsModel = new OrderItemModel();
            $cartItems = $orderItemsModel->where('order_id', $cart['id'])->findAll();
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item['item_price'] * $item['quantity'];
            }
            $this->cart['total'] = $total;
            $this->cart['count'] = sizeof($cartItems);
        }
    }

    public function index()
    {
        $products = $this->productModel->findAll(4);
        return view('pages/home', [
            "categories" => $this->categories,
            "products" => $products,
            "cart" => $this->cart, 
        ]);
    }

    public function getByCategory($categoryId)
    {
        $categoryName = $this->categoryModel->where('id', $categoryId)->findColumn('name');

        $products = $this->productModel->where('category_id', $categoryId)->findAll();

        return view('/products', [
            'title' => $categoryName[0],
            'products' => $products,
            'categories' => $this->categories,
        ]);
    }

    public function getAll()
    {
        $products = $this->productModel->findAll();


        return view('/products', [
            'title' => "Semua Produk",
            'products' => $products,
            // "products" => [1,2,3,4,5], // Dummy Data
            'categories' => $this->categories,
        ]);
    }

    public function productDetail($id)
    {
        $product = $this->productModel->find($id);
        return view('productDetail',[
            'product'=> $product,
            'categories' => $this->categories,
        ]);
    }
    

    public function addChart()
    {
        $data = $this->request->getVar();
        
        $orderItemModel = new OrderItemModel();

        $userOrder = $this->orderModel->where('user_id', getId())->where('status', 'pending')->first();
        $userOrder = isset($userOrder['id']) ? $userOrder['id'] : null;
        
        if ($userOrder == null) {
            $userOrder = $this->orderModel->insert([
                'user_id' => getId(),
                'is_sales' => true,
                'status' => 'pending',
            ]);
        }

        $orderItemModel->insert([
            'order_id' => $userOrder,
            'product_id' => $data['id'],
            'item_price' => $data['price'],
            'quantity' => $data['quantity'],
        ]);

        return redirect()->to(url_to('home'));
    }

}
