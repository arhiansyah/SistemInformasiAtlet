<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin as ModelsAdmin;

class AdminController extends Controller
{
    public function index() 
    { 
        return view('login.login'); 
    } 
 
    public function authenticate(Request $request){ 
        $validateData = $request->validate([ 
            'username'           => 'required', 
            'password'          => 'required', 
        ]); 

        $result = ModelsAdmin::where('username', '=', $validateData['username'])->first(); 
        if($result){ 
            if (($request->username == $result->username && $request->password == $result->password && $request->username !== 'admin')) {
                session(['username' => $request->username]); 
                return redirect('/dashboard')->withInput()->with('success',"Login Berhasil");
            } elseif(($request->username == $result->username && $request->password == $result->password)) {
                session(['username' => $request->username]);
                return redirect('/userSistem')->withInput()->with('success',"Login Berhasil");
            } else {
                return back()->withInput()->with('error',"Login Gagal");
            }

            // if (($request->password == $result->password)) 
            // { 
            //     session(['username' => $request->username]); 
            //     return redirect('/dashboard')->withInput()->with('pesan',"Login Berhasil");  
            // } 
            // else { 
            //     return back()->withInput()->with('pesan',"Login Gagal"); 
            // } 
        } 
        else{ 
            return back()->withInput()->with('error',"Login Gagal"); 
        } 
    } 
 
    public function logout(){ 
        session()->forget('username'); 
        return redirect('login')->with('pesan','Logout berhasil'); 
    }
    public function userSistem()
    {
        $data['module']['name'] = "User Sistem";
        $data['currentAdminMenu'] = 'userSistem';
        $admins = ModelsAdmin::all();
        $username = ModelsAdmin::select('Admins.username');
        $password = ModelsAdmin::select('Admins.password');
        if (session('username') !== 'admin') {
            abort(403);
        }
        return view('pages.userSistem', compact('admins', 'username', 'password'), ['data' =>$data]);
    }
}   