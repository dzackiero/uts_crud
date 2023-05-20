<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $helpers=  ['number'];

    public function index()
    {
        //User
        $userModel = new UserModel();
        $employees = $userModel->whereIn('role',[1,2])->findColumn('id');
        $users = $userModel->whereIn('role',[3])->findColumn('id');

        // Transaksi dan Laba
        $orderItemModel = new OrderItemModel();
        $orderModel = new OrderModel();
        $succeedOrders = $orderModel->where('status', 'success')->findColumn('id');
        $items = $orderItemModel->select('order_id, sum(item_price*quantity) as "total"')->groupBy('order_id')->whereIn('order_id',$succeedOrders)->findAll();
        $succeedOrders =$orderModel->where('status', 'success')->findAll();  
        $totals = [];
        foreach($items as $items){
            $totals[$items['order_id']] = $items['total'];
        }
        
        $orderCount = sizeof($succeedOrders);
        $employeeCount = sizeof($employees);
        $userCount = sizeof($users);
        $income = 0;

        foreach($succeedOrders as $order){
            if ($order['is_sales'] == true) {
                $income += $totals[$order['id']];
            } else {
                $income -= $totals[$order['id']];
            }
        }

        return view("pages/admin/home", [
            'income' => $income,
            'userCount' => $userCount,
            'employeeCount' => $employeeCount,
            'orderCount' => $orderCount,
        ]);
    }

}
