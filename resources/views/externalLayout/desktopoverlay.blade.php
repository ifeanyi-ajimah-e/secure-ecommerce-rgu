<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="header__top__left">
                    <p>   </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="header__top__right">
                    <div class="header__top__links">
                        @guest
                        <a href="{{ url('login')}}">Sign in</a>
                        <a href="{{ url('sign-up')}}"> Sign Up </a>
                        @endguest
                    </div>
                    <div class="header__top__hover">
                        @auth
                        <span> {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                        <ul>
                            {{-- <li>USD</li>
                            <li>EUR</li> --}}
                            <li>
                                <a class="" href="{{ route('customer-logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('customer-logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

