<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class Employee extends BaseController
{

    protected $UserModel;
    protected $helpers = ["user"];
    protected $roles;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $roleModel = new RoleModel();
        $roles = $roleModel->whereNotIn('name',['User'])->find();
        $this->roles = [];


        foreach ($roles as $role) {
            $this->roles[$role['id']] = $role['name'];
        }
    }
    
    public function index()
    {
        $employees = $this->UserModel->whereNotIn('role',[3])->findAll();


        return view("pages/admin/employee/index",[
            'employees' => $employees,
            'roles' => $this->roles,
        ]);
    }


    public function create()
    {
        $roles = $this->roles;
        unset($roles[1]);

        return view("pages/admin/employee/form", [
            'title' => "Tambah Karyawan",
            'method' => '/admin/employees/store',
            'roles' => $roles,
        ]);
    }

    public function store()
    {
        $data = $this->request->getVar();
        $this->UserModel->insert([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
        ]);

        return redirect()->to(url_to('employees'));
    }

    public function get(int $id)
    {
        $employee = $this->UserModel->find($id);
        if ($employee == null) {
            return redirect()->to(url_to('employees'));
        }

        return view('/pages/admin/employee/form', [
            'title' => 'Edit Karyawan',
            'employee' => $employee,
            'roles' => $this->roles,
            'method' => "/admin/employees/$id/update",
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
        
        return redirect()->to(url_to('employees'));
    }

    public function delete(int $id)
    {
        $this->UserModel->delete($id);
        return redirect()->to(url_to('employees'));
    }




}
