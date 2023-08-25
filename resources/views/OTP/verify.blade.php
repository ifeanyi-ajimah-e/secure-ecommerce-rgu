
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Mens Fashion | Verify OTP</title>

    <link href="{{ asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">
                        {{-- @include('includes.messages') --}}
                    <h2 class="font-bold"> Enter Your OTP </h2>

                    {{-- <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p> --}}

                    <div class="row">
                            {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif --}}
                            
                            <div class="col-lg-12">
                            @include('includes.messages')
                            <form class="m-t" role="form" method="POST" action="/verifyOTP">
                                @csrf
                                <div class="form-group">
                                    <label for="otp" class="col-md-4 col-form-label ">{{ __('OTP') }}</label>
                                    <input type="number" placeholder="enter OTP"  class="form-control @error('password') is-invalid @enderror" name="OTP" value="{{old('OTP')}}" required autofocus>

                                    @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                           <button type="submit" class="btn btn-primary block full-width m-b"> Submit </button> 
                        </form>
                         <a href="{{ url('/resend-otp')}}">
                            <small> Resend OTP </small>
                        </a> 
                        <br> <br>
                         <a href="{{ url('/admin')}}">
                            <small> Go back ? </small>
                        </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Mens Fashion
            </div>
            <div class="col-md-6 text-right">
               <small>© 2023</small>
            </div>
        </div>
    </div>

</body>

</html> 






