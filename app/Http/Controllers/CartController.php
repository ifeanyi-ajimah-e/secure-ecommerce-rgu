<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carts'] = Cart::where('user_id',Auth::user()->id )->get();
        $data['cartSum'] = Cart::where('user_id',Auth::user()->id)->sum('total_price');
        return view('external.shoppingcart',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOut()
    {
        $data['carts'] = Cart::where('user_id',Auth::user()->id )->get();
        $data['cartSum'] = Cart::where('user_id',Auth::user()->id)->sum('total_price');
        return view('external.checkout',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
         $data = $request->validated();
         $product = Product::find($data['product_id']);
         $data['price'] = $product->price;
         $data['total_price'] = $product->price * $data['quantity'];
        $data['user_id'] = Auth::id();
         Cart::create($data);

         return redirect('/cart')->with('status', 'Cart Item added !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

    }

    public function cartQuantityUpdate(Request $request,  $id)
    {

        $credentials = $request->validate([
            'id' => ['required', 'integer'],
            'qty' => ['required','integer'],
        ]);
        
        $cart = Cart::find($id);
        $cart->quantity = $credentials['qty'];
        $cart->total_price = $cart->price * $credentials['qty'];
        $cart->save();
        $data['cart'] = $cart;
        $data['sumCart'] = Cart::where('user_id',Auth::user()->id)->sum('total_price');
        return response()->json([ 'response' => [
            'status' => 'success',
            'data' => $data,
        ]
        ]);

    }

    public function cartRemove($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json([ 'response' => [
            'status' => 'success',
            'message' => 'Item deleted',
        ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('status','Cart Deleted');
    }
}
