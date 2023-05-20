<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class Customer extends BaseController
{

    protected $UserModel;
    protected $helpers = ["user"];

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $customers = $this->UserModel->where('role',3)->orderBy('created_at','DESC')->findAll();
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        $idRoles = [];

        foreach ($roles as $role) {
            $idRoles[$role['id']] = $role['name'];
        }


        return view("pages/admin/customer/index",[
            'customers' => $customers,
            'roles' => $idRoles,
        ]);
    }


    public function create()
    {
        return view("pages/admin/customer/form", [
            'title' => "Tambah Pelanggan",
            'method' => '/admin/customers/store',
        ]);
    }

    public function store()
    {
        $roleModel = new RoleModel();
        $userRole = $roleModel->where('name', 'User')->first();

        $data = $this->request->getVar();
        $this->UserModel->insert([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'role' => $userRole['id'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
        ]);

        return redirect()->to(url_to('customers'));
    }

    public function get(int $id)
    {
        $customer = $this->UserModel->find($id);
        return view('/pages/admin/customer/form', [
            'title' => 'Edit Pelanggan',
            'customer' => $customer,
            'method' => "/admin/customers/$id/update",
        ]);
    }


    public function update(int $id)
    {
        $data = $this->request->getVar();
        $this->UserModel->update($id,[
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);
        
        return redirect()->to(url_to('customers'));
    }

    public function delete(int $id)
    {
        $this->UserModel->delete($id);

        return redirect()->to(url_to('customers'));
    }


}
