@include('layouts.head')

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- LOADER -->
        @include('layouts.loader')
        <!-- /LOADER -->
        
        <!-- SIDEBAR -->
        @include('layouts.sidebar')
        <!-- /SIDEBAR -->

        <!-- CONTENT PANEL -->
        <div class="content-wrapper">           

            <!-- MAIN AREA -->
            @yield('main')
            <!-- /MAIN AREA -->
        </div>  
    </div>
            <!-- /CONTENT PANEL -->

  <!-- ALL END HERE -->

 @include('layouts.footer')