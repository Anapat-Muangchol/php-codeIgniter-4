<?php

namespace App\Controllers;

// http://example.com/[controller-class]/[controller-method]/[arguments]
// http://example.com/news/latest/10

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
