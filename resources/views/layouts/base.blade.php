<!DOCTYPE html>
<html lang="en">
@include('layouts.components.head')

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('layouts.components.header')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('layouts.components.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('layouts.components.header-desktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            
            <div class="main-content">
                @yield('content')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    @include('layouts.components.scripts')
    
    @stack('scripts')
</body>

</html>
<!-- end document-->
