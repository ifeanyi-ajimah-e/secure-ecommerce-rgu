<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UserType;
use App\Models\Product;
use App\Models\User;
use App\Utils\AdminType;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['adminCount'] = User::where('type',AdminType::ADMIN)->count();
        $data['customerCount'] = User::where('type',AdminType::CUSTOMER )->count();
        $data['productCount'] = Product::count();
        return view('home',compact('data')); 
    }
}
