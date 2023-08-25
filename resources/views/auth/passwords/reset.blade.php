
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Male Fashion | Forgot password</title>

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
                        @include('includes.messages')
                    <h2 class="font-bold">Reset password</h2>

                    {{-- <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p> --}}

                    <div class="row">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                    <input type="email" placeholder="enter new email" readonly class="form-control @error('password') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="enter new password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
                                    <input type="password" placeholder="confirm new password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                
                           <button type="submit" class="btn btn-primary block full-width m-b"> Reset Password </button> 
                        </form>
                        {{-- <a href="{{ url('/')}}">
                            <small> login ? </small>
                        </a> --}}
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

