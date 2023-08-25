@extends('externalLayout.main')

@section('title')
    Check Out
@endsection
@section('breadcrumb')
    Check Out
@endsection
@section('content')
 <!-- Shopping Cart Section Begin -->
 <section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['carts'] as $cart)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-1.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6> {{$cart->product->name }} </h6>
                                        <h5> {{ $cart->price }} </h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2 ">
                                            <input class="itemCount" id="qty{{ $cart->id }}" type="number" min="1" data-id="{{$cart->id}}" value="{{$cart->quantity}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price"   > $ <span  id="tprice{{ $cart->id }}" > {{ $cart->total_price }} </span> </td>
                                <td class="cart__close"> <span class="deletecart" data-id="{{$cart->id}}" > <i class="fa fa-close "></i> </span> </td>
                            </tr>
                            @empty
                                <p>No Cart Item </p>
                            @endforelse
                            {{-- <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-2.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>Diagonal Textured Cap</h6>
                                        <h5>$98.49</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 32.50</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-3.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>Basic Flowing Scarf</h6>
                                        <h5>$98.49</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 47.00</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-4.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>Basic Flowing Scarf</h6>
                                        <h5>$98.49</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 30.00</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="shop">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="/cart"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span id="subTotal">$ {{ $data['cartSum']}} </span></li>
                        <li>Total <span id="subTotal2" >$ {{ $data['cartSum']}} </span></li>
                    </ul>
                    @if ($data['cartSum'] > 0 )
                    <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection

@section('scripts')
<script>

    $('.itemCount').on('change', function (e) {
        var cart_id = $(this).data('id'); 
        var new_qty = $("#qty"+cart_id).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
        
                url = '/cart-update/'+cart_id,
                formData = {
                    id : cart_id,
                    qty : new_qty,
                }
                $.post(url, formData).done(function (data) {
                    // console.log(data.response.data.sumCart)

                    $("#subTotal").text(data.response.data.sumCart)
                    $("#subTotal2").text(data.response.data.sumCart)
                    $("#tprice"+cart_id).text(data.response.data.cart.total_price)
                    }).fail(function (error) {
                        console.log(error);
                    });
             });

             
             
             $('.deletecart').on('click',function(e){
                
                  var ask = confirm("Are you sure you want to delete this cart item?  ");
                 if( ask == true){ 
                    let the_cart_id = $(this).data('id'); 
                    alert(the_cart_id)
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
        
                url = '/cart-remove/'+the_cart_id,
                formData = {
                    id : the_cart_id,
                }
                $.post(url, formData).done(function (data) {
                    //    alert("deleted")
                       location.reload();
                    }).fail(function (error) {
                        console.log(error);
                    });
                 }
             });

</script>

@endsection


{{-- $.ajax({
    url: '/peoples/' + id,
    type: 'DELETE',
    dataType: 'json',
    data: {
        _token: {{ csrf_token() }}
    },
    success: function(response) {
        console.log(response);
    },
    error: function(response) {
        console.log(response);
    }
}); --}}