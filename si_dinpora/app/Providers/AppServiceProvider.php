<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    } 

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::define('admin_auth', function(Admin $admin){
        //     if (session('username') !== 'admin') {
        //         abort(403);
        //     } elseif (session()->has('username')){
        //         return redirect('/dashboard');
        //     } else {
        //         return redirect('/login')->with('pesan',"Maaf, silahkan login terlebih dahulu");
        //     }
        // });
    }
}