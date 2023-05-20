<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class Transaction extends BaseController
{

    protected $helpers  = ['users', 'number'];
    protected $orderModel;
    protected $orderItemModel;
    protected $userModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $transactions = $this->orderModel->orderBy('created_at','DESC')->findAll();
        $orderItems = $this->orderItemModel->select('order_id, sum(item_price*quantity) as "Total Price"')->groupBy('order_id')->findAll();
        $users = $this->userModel->select('id, name')->findAll();
        $usersId = [];
        foreach ($users as $user){
            $usersId[$user['id']] = $user['name'];
        }
        
        $prices = [];
        foreach ($orderItems as $item){
            $prices[$item['order_id']] = $item['Total Price'];
        }

        return view("pages/admin/transaction/index",[
            'transactions' => $transactions,
            'prices' => $prices,
            'users' => $usersId,
        ]);
    }


    public function create()
    {
        $users = $this->userModel->select('id, name, role')->orderBy('role','ASC')->findAll();

        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        $rolesId = [];

        foreach ($roles as $role) {
            $rolesId[$role['id']] = $role['name'];
        }

        $productModel = new ProductModel();
        $products = $productModel->select('id, name, cost, price')->findAll();
        
        return view("pages/admin/transaction/form", [
            'title' => "Buat Transaksi",
            'method' => 'store',
            'users' => $users,
            'roles' => $rolesId,
            'products' => $products,
        ]);
    }

    public function store()
    {
        $data = $this->request->getVar();
        
        $productCount = $data['productCount'];
        $productModel = new ProductModel();
        
        $isSales = $data['is_sales'] == 'true' ? true : false;

        for($i = 0; $i < $productCount; $i++) { 
            $product = $productModel->find($data["product$i"]);
            
            if ($isSales && $data["quantity$i"] > $product['stock']) {
                session()->setFlashdata('msg', "Stok tidak mencukupi!");
                return redirect()->to(url_to('create_transaction'));
            }

        }


        // Make Order
        $orderId = $this->orderModel->insert([
            'user_id' => $data['user_id'],
            'is_sales' => $isSales,
            'address' => $data['address'],
            'status' => 'success',
        ]);

        for($i = 0; $i < $productCount; $i++) { 
            $product = $productModel->find($data["product$i"]);
            $item = [
                'order_id' => $orderId,
                'product_id' => $data["product$i"],
                'quantity' => $data["quantity$i"],
            ];

            $item['item_price'] =  $isSales ? $product['price'] : $product['cost'];

            // Checking if its more than stock has
            if ($isSales && $item['quantity'] > $product['stock']) {
                redirect()->to(url_to('create_transaction'));
            }

            $this->orderItemModel->insert($item);

            //adding or decreasing the product
            $quantity = $isSales ? -1*($item["quantity"]) : $item["quantity"];
            $productModel->update($item['product_id'], [
                'stock' => $product['stock'] + $quantity,
            ]);
        }

        return redirect()->to(url_to('transactions'));
    }

    public function get(int $id)
    {
        // Getting this transaction
        $transaction = $this->orderModel->find($id);
        
        // Getting all the items
        $transactionItems = $this->orderItemModel->where('order_id', $id)->findAll();
        // Yg bakal di tampilin

        //Getting all the product
        $productIds =[];
        foreach($transactionItems as $item){
            $productIds[] = $item['product_id'];
        }

        $productModel = new ProductModel();
        $products = $productModel->select('id, name')->whereIn('id', $productIds)->withDeleted(true)->findAll();
        $productsId = [];
        foreach ($products as $product) {
            $productsId[$product['id']] = $product['name'];
        }
        // Getting the user
        $user = $this->userModel->find($transaction['user_id']);
        // Getting Total
        $total = $this->orderItemModel->select('order_id, sum(item_price*quantity) AS total')->where('order_id', $id)->groupBy('order_id')->find()[0];
        return view("pages/admin/transaction/detail", [
            'title' => "Detail Transaksi",
            'user' => $user,
            'products' => $productsId,
            'transaction' => $transaction,
            'orderItems' => $transactionItems,
            'total' => $total['total'],
        ]);
    }

    public function delete(int $id)
    {
        $this->orderModel->delete($id);

        return redirect()->to(url_to('products'));
    }




}
