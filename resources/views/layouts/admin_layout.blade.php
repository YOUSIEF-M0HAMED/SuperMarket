<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{  asset('Admin/css/font-face.css')}}" rel="stylesheet" media="all ">
    <link href="{{  asset('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{  asset('Admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{  asset('Admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{  asset('Admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper" style="background: #ffffff;">

        <p style="visibility: hidden;">good work</p>
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo"  style="background-color:black; padding:0px; margin:0px;">
                <a href="{{ route('admin.dashboard') }}"  style=" width: 160px; margin-right: 10px;" >
                    <img src="{{  asset('Admin/logo/admin-logo.jpeg')}}" alt="Cool Admin" />
                </a>


                 <a href="{{ route('index') }}"  style="width: 160px; margin: 0px; ">
                    <img src="{{  asset('Admin/logo/front-logo.jpeg')}}" alt="Cool Front" />
                </a> 

            </div>

            {{--  <a href="{{ route('index') }}"  style="width: 179px ; height: 52px">
                    <img src="{{  asset('Admin/logo/front-logo.jpeg')}}" alt="Cool Front" />
                </a>  --}}

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Tables</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('categories.index') }}"> All Categories </a>
                                </li>
                                <li>
                                    <a href="{{ route('brands.index') }}"> All Brands </a>
                                </li>
                                <li>
                                    <a href="{{ route('products.index') }}"> All Products </a>
                                </li>

                                <li>
                                    <a href="{{ route('orders.index') }}">All Orders </a>
                                </li>
                                <li>
                                    <a href="{{ route('orderitems.index') }}">All Order_Items </a>
                                </li>
                                <li>
                                    <a href="{{ route('customers.index') }}">All Customers</a>
                                </li>

                            </ul>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Forms</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('categories.create') }}"> New Category </a>
                                </li>
                                <li>
                                    <a href="{{ route('brands.create') }}"> New Brand </a>
                                </li>
                                <li>
                                    <a href="{{ route('products.create') }}"> New Product </a>
                                </li>

                                <li>
                                    <a href="{{ route('orders.create') }}">New Order</a>
                                </li>
                                <li>
                                    <a href="{{ route('orderitems.create') }}">New Order_Item </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">

                            <div class="header-button" style="padding-left:80%; ">
                                <div class="account-wrap">
                                    <div class="clearfix account-item js-item-menu">
                                        <div class="image">
                                            <img src="{{  asset('images/profile_photos/'.auth()->user()->image)}}" alt="{{auth()->user()->fname}} photo" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ auth()->user()->fname." ".auth()->user()->lname }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="clearfix info">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{  asset('images/profile_photos/'.auth()->user()->image) }}" alt="{{auth()->user()->fname}} photo" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth()->user()->fname }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__footer">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                   <a href='#'> <button style="color: ##333; background-color:transparent;" type="submit"><i class="zmdi zmdi-power"></i>Logout</button> </a>
                                                </form>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
<div style="margin: 70px; opacity: 0;  background-color: white">
  
</div>

      @yield('content')

                        {{--  <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{  asset('Admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{  asset('Admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{  asset('Admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{  asset('Admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{  asset('Admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{  asset('Admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{  asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{  asset('Admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{  asset('Admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{  asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{  asset('Admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{  asset('Admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{  asset('Admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
