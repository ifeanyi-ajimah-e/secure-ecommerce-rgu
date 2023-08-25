<!DOCTYPE html>
<html>

@include('adminlayout.header')
@yield('style')
<body>
      @include('sweetalert::alert') 
      
    <div id="wrapper">

      @include('adminlayout.sidebar')

      <div id="page-wrapper" class="gray-bg">
              @include('adminlayout.navbar')
      <div class="wrapper wrapper-content">

      @if ( !\Request::is('home') )

      <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                  @include('includes.messages')
            <h2> @yield('subtitle')</h2>
            <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                        <a href="/home">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                        <a href=@yield('breadcrumb_link')> @yield('breadcrumb_one')</a>
                  </li>
                  <li class="breadcrumb-item active">
                        <strong> @yield('breadcrumb')</strong>
                  </li>
            </ol>
            </div>
      </div>
      @endif

        @yield('content')
        </div>
           @include('adminlayout.footer')
        </div>

       {{-- @include('adminlayout.rightsidebar') --}}

    </div>
        @include('adminlayout.scripts')
        
        @yield('scripts')
</body>

</html>
