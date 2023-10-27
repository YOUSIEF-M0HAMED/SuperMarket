<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Swift Pay</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('Front/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('Front/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('Front/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('Front/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{ asset('Front/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="index">Home</a></li>
                           <li><a href="{{ route('AboutUs') }}">About Us</a></li>
                           <li><a href="{{ route('ContactUs') }}">Contact us</a></li>

                           @guest
                              <li><a href="{{ route('login') }}">Login</a></li>
                              <li><a href="{{ route('register') }}">Sign Up</a></li>
                           @endguest
                           @auth <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                               <button style="color: #f1f1f1; background-color:transparent;" type="submit">Logout</button>
                            </form>
                        </li> @endauth
                        </ul>
                     </div>
                  </div>

               </div>

            </div>

         </div>
         @auth
         <h3 style="color:white;display:inline-end;">{{ Auth::user()->name }}</h3>
         <!-- header top section start -->
         @endauth<!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">




                  <div class="main">
                      <form action="{{ route('handle-search') }}"  method="POST">
                         @csrf
                            <!-- Another variation with a button -->
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" placeholder="Search this blog">
                                <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                                <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div>

                      </form>
                 </div>
                  <div class="header_box">

                     <div class="login_menu">
                        <ul>
                           <li><a href="{{ route('GetFromCart') }}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>

                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"> <br>All You Want is Here</h1>

                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital"><br>Discounts All Times</h1>

                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->



      <!-- fashion section start -->




      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel " >
            <div class="carousel-inner">

               <div class="carousel-item active">
                  <div class="container">
                     <div class="fashion_section_2">
                        <div class="row">

              @foreach ($products as $product)

                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ $product->name }}</h4>
                                 <p class="price_text">Price :  <span style="color: #262626;">{{ $product->price }}</span> EG</p>
                        @if($product->discount > 0)
                                 <p class="price_text">Discount :  <span style="color: #262626;">{{ $product->discount }}</span> %</p>
                         @endif
                                 <div class="tshirt_img"><img src="{{ asset('images/products/'.$product->img) }}" alt="Product Image"></div>
                                 <div class="btn_main">

                                    <form action="{{ route('AddToCart',$product->id) }}" method='POST'>
                                        @csrf
                                        <div>
                                        <label for="prod_quantity">Quantity</label>
                                        <input name="prod_quantity" type="number" value="1" min="1" class="form-control"  style="width:100px;" >
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Buy Now" >


                                     </form>
                                 </div>
                              </div>
                           </div>

             @endforeach


                        </div>
                     </div>
                  </div>
               </div>



            </div>

         </div>
      </div>


      <!-- fashion section end -->
      <!-- electronic section start -->

      <!-- electronic section end -->
      <!-- jewellery  section start -->



      <!-- jewellery  section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">

            <div class="footer_menu">
               <ul>
                  <li><a href="{{ route('ContactUs') }}">Contact Us</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 All Rights Reserved. Design by Us</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('Front/js/jquery.min.js')}}"></script>
      <script src="{{ asset('Front/js/popper.min.js')}}"></script>
      <script src="{{ asset('Front/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('Front/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{ asset('Front/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('Front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('Front/js/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
