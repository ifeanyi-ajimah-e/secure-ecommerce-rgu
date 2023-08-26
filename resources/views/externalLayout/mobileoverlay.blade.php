<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            @guest
            <a href="{{ url('login')}}"> Sign in</a>
            <a href="{{ url('sign-up')}}"> Sign Up </a>
            @endguest
        </div>
        <div class="offcanvas__top__hover">
            @auth  
            <span> {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
            <ul>
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
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{ asset('menfashionexternal/img/icon/search.png')}}" alt=""></a>
        <a href="#"><img src="{{ asset('menfashionexternal/img/icon/heart.png')}}" alt=""></a>
        <a href="#"><img src="{{ asset('menfashionexternal/img/icon/cart.png')}}" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee. pp</p>
    </div>
</div>

