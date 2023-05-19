<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;

class Admin extends BaseController
{
    public function index()
    {
        $orderItemModel = new OrderItemModel();
        $orderModel = new OrderModel();
        $succeedOrders = 
        $orders = $orderItemModel->select('order_id, sum(item_price*quantity)')->groupBy('order_id')->findAll();


        return view("pages/admin/home");
    }

}
