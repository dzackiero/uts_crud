<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['user'];

    public function index()
    {
        return view('pages/home');
    }
}
