
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Male Fashion Dashboard- Login </title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}">

    <link href="{{ asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css')}}" rel="stylesheet">

    {{-- <script async src="https://www.google.com/recaptcha/api.js"> --}}
</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <img src="img/logo.png" alt="male fashion">
                <h2 class="font-bold"> Male Fashion Portal </h2>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>

                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                <p>
                    <small> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, </small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    @include('includes.messages')
                
                    <form class="m-t" role="form" method="POST" action="{{ route('login')}}">
                        @csrf 
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="Enter email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required="">
                        </div>


                        <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>

                        <input class="form-check-input" type="hidden" name="otp_via" value="email_otp" id="flexRadioDefault1" >
                        
                        {{-- <div class="form-check">
                            <input class="form-check-input" type="radio" name="otp_via" value="email_otp" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                              OTP via email
                            </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="otp_via" value="sms_otp" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                              OTP via sms
                            </label>
                          </div> --}}
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="{{ url('password/reset')}}">
                            <small>Forgot password?</small>
                        </a>

                    </form>
                    <p class="m-t">
                        <small>Male Fashiion &copy; 2023</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Male Fashion Limited. 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2023</small>
            </div>
        </div>
    </div>

</body>

</html>
