<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    { 
        $data['module']['name'] = "Dashboard";
        $data['currentAdminMenu'] = 'dashboard'; 
        return view('dashboard.index',['data' => $data]); 
    }
}