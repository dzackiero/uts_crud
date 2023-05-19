<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['user'];

    public function index()
    {
        return view('pages/home', [
            "products" => [1,2,3,4,5] // Dummy Data
        ]);
    }
    
    /* TESTING METHODS */ 
    public function setRole($role)
    {
        session()->set('role',ucwords($role));
        session()->set('isLoggedIn', true);
    }
}
