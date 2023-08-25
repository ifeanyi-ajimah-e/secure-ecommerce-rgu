@extends('externalLayout.main')

@section('title')
    Register
@endsection
@section('breadcrumb')
    Register
@endsection

@section('content')


<!-- Contact Section Begin -->
<section class="contact spad">
    @include('includes.messages')
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
           
            <div class="col-lg-8 col-md-8 ">
                <div class="contact__form ">
                    <form action="{{ route('register')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Name">
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone">
                            </div>
                            <div class="col-lg-12">
                                <input type="password" name="password" placeholder="password">
                            </div>
                            <div class="col-lg-12">
                                <input type="password" name="password_confirmation" placeholder="Password confirmation">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn"> Register </button>
                            </div>
                            <p> Already registered ? <a href="/login"> Login </a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection




