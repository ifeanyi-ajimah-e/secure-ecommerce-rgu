<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\ProductService;
use App\Utils\ColorList;
use App\Utils\SizeList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private ProductService $productservice;

    public function __construct()
    {
        $this->productservice = new ProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-products', Auth::user() );
        $data = $this->productservice->index();
        
        return view('product.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage-products', Auth::user() );
        $data = $this->productservice->create();

        return view('product.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('manage-products', Auth::user() );
        $validated = $request->validated();
        $data = $this->productservice->store($validated);

        Alert::success('Success', 'Product Uploaded Successfully');
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('manage-products', Auth::user() );
        $data = $this->productservice->edit();

        return view('product.edit',compact('data','product'));
    }

    public function activateProduct(Request $request)
    { 

        $this->authorize('manage-products', Auth::user() );
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->passes()) {
            
            $product = Product::find($request->id);
            if ($product) {
                if($product->status == 0)
                {
                    $product->status = 1;
                    $product->save();
                    return response()->json(['res' => [
                        'status' => 'success',
                        'message' => 'Action successful.'
                    ]]);
                }elseif($product->status == 1)
                {
                    $product->status = 0 ;
                    $product->save();
                    return response()->json(['res' => [
                        'status' => 'success',
                        'message' => 'Action successful'
                    ]]);
                }
            }
            else {
                return response()->json(['res' => [
                    'status' => 'failure',
                    'message' => 'Product not found'
                ]]);
            }
        } else {
            return response()->json(['res' => [
                'status' => 'failure',
                'message' => 'Error! Validation failed'
            ]]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $this->authorize('manage-products', Auth::user() );
        $validated = $request->validated();
        $data = $this->productservice->update($validated,$product);

        Alert::success('Success', 'Product Uploaded Successfully');
        return redirect('/product');
    }

    public function getSizes()
    {
        $data['sizes'] = SizeList::SIZES;
        return view('product.sizes',compact('data'));
    }

    public function getColors()
    {
        $data['colors'] = ColorList::ALL_COLORS;
        return view('product.colors',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
