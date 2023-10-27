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
      <title>Contact Us</title>
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
      <style>
        h1,h2{color: #9e19e8}
        p,li{color: #f1f1f1;
            font-weight: 500;
            font-size: 16px;
        }

        li {
            margin-bottom: 10px;
        }
        .sochial {
            text-decoration: none;
            color: #0077b5; /* LinkedIn blue color */
            font-weight: bold;
            border: 2px solid #000dff; /* LinkedIn blue color */
            border-radius: 5px;
            padding: 5px 15px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }
      </style>
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main" style="background-image:url('https://static.wixstatic.com/media/924b8f_b81244f33333431eb590b49d77c2896c~mv2.jpeg/v1/fill/w_858,h_572,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/924b8f_b81244f33333431eb590b49d77c2896c~mv2.jpeg');">
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
      </div>
      <!-- banner bg main end -->



      <!-- fashion section start -->



      <div class="fashion_section" style="background-image:url('https://static.wixstatic.com/media/924b8f_b81244f33333431eb590b49d77c2896c~mv2.jpeg/v1/fill/w_858,h_572,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/924b8f_b81244f33333431eb590b49d77c2896c~mv2.jpeg');">
         <div id="main_slider" class="carousel slide" data-ride="carousel " >
            <div class="carousel-inner">

               <div class="carousel-item active">
                  <div class="container">


                    <h1>Contact Us</h1>


                    <p>If you have any questions, suggestions, or would like to inquire about our products/services, please don't hesitate to contact us.</p>

                    <p>Email: info@example.com</p>
                    <p>Phone: 123-456-7890</p>


                    <p>Alternatively, you can reach us via:</p>

                    <ul>
                        <li>Email: Yousief@gmail.com</li>
                        <li>Phone: 123-456-7890</li>
                        <li>Address: 123 Street, Cairo, Egypt</li>
                    </ul>

                    <h2>Connect with us on social media:</h2>
                    <ul>
                        <li><a href="https://www.facebook.com/yousief.mahamed" target="_blank" class='sochial'>Facebook</a></li>
                        <li><a href="www.linkedin.com/in/yousief-mohamed-a3074227b" target="_blank" class='sochial'>LinkedIn</a></li>
                        <li><a href="https://www.instagram.com/yousief_mohamed__" target="_blank" class='sochial'>Instagram</a></li>
                    </ul>

                    <h2>Open Hours</h2>
                    <p>We're open from 9:00 AM to 6:00 PM, Monday to Friday. Feel free to drop by our office:</p>
    <p>Office Hours: 9:00 AM - 6:00 PM</p>
    <p>Location: 456 Office Street, Cairo, Egypt</p>
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
            <p class="copyright_text">© 2023 All Rights Reserved. Design by Yousief Fahmy</p>
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
