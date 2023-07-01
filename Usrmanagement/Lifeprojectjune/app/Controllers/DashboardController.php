<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Hello : ".$session->get('name');
       
    }
}
