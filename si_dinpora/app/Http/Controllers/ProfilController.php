<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() 
    { 
        $data['module']['name'] = "Profil";
        $data['currentAdminMenu'] = 'profil';  
        return view('profil.index',['data' => $data]); 
    }
}