
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Male Fashion - Login </title>
    <link rel="shortcut icon" href="{{ asset('img/novusagrologo.png')}}">

    <link href="{{ asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <img src="img/logo.png" alt="novus agro logo">
                <h2 class="font-bold"> Male Fashion </h2>

                <p>
                    Our main objective is to aggregate smallholder farmers and make them available for any stakeholder in the agricultural sector who wants to transact with them.
                </p>

                <p>
                    Grainpoint is a platform connecting farmers to markets.</p>
                <p>
                    <small> Farmers get paid almost immediately at the prevailing market price thereby removing the problem of extortion from middlemen and making market available for farmers. </small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    @include('includes.messages')
                    <form class="m-t" role="form" method="POST" action="{{ route('login')}}">
                        @csrf 
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="{{ url('password/reset')}}">
                            <small>Forgot password?</small>
                        </a>

                    </form>
                    <p class="m-t">
                        <small> Male Fashion &copy; 2023</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Male Fashion. 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2023</small>
            </div>
        </div>
    </div>

</body>

</html>
