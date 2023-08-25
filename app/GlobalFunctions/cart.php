<?php 

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

function getCartSum(){

    return Cart::where('user_id',Auth::user()->id)->sum('total_price');

}

