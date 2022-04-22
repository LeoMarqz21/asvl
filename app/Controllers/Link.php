<?php

namespace App\Controllers;

class Link extends BaseController
{
    public function __construct()
    {
        //code...
    }
    public function index()
    {
        return view('header') . view('link/index') . view('footer');
    }

    public function register()
    {
        return view('user/register');
    }
}
