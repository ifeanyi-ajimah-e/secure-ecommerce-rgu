<!DOCTYPE html>
<html lang="zxx">


@include('externalLayout.header')

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>

    @include('externalLayout.mobileoverlay')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
       @include('externalLayout.desktopoverlay')
       @include('externalLayout.nav')
    </header>
    <!-- Header Section End -->
   @include('includes.messages')
    @if (! \Request::is('/'))
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4> @yield('breadcrumb') </h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="#"> @yield('breadcrumb') </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @endif

    @yield('content')

  @include('externalLayout.footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    
@include('externalLayout.scripts')

@yield('scripts')

</body>

</html>


