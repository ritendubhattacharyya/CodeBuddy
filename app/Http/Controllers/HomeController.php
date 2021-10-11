<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\ACL;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(ACL::class);
        // \Log::info("Auth = ".auth()->user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        \Log::info("Auth = ".auth()->user());
        return view('home');
    }
    
    public function getAdminDashboard()
    {
        if(auth()->user()->role !== 'Admin') {
            return redirect('home');
        }
        return view('admin-dashboard');
    }
}
