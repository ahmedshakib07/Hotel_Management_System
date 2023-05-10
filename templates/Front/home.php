<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        HOOLULU
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

        <!-- CSS here main-->
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/magnific-popup.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/themify-icons.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/nice-select.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/flaticon.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/gijgo.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/animate.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/slicknav.css">
        <link rel="stylesheet" href="<?= PROJECT_ROOT ?>frontview/css/style.css">
        <!-- <link rel="stylesheet" href="css/responsive.css"> main-->

    
</head>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="#">Home</a></li>
                                        <li><a href="#">Rooms</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="<?= PROJECT_ROOT ?>frontview/img/sss-removebg.ico" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/ahmedshakib07">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com/ahmedshakib07">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/ahmedshakib07">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Book A Room</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>HOOLULU Resort</h3>
                                <p>Unlock to enjoy the view of HOOLULU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Life is Beautiful</h3>
                                <p>Unlock to enjoy the view of HOOLULU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>HOOLULU Resort</h3>
                                <p>Unlock to enjoy the view of HOOLULU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Life is Beautiful</h3>
                                <p>Unlock to enjoy the view of HOOLULU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>About Us</span>
                            <h3>A Luxuries Hotel <br>
                                with Nature</h3>
                        </div>
                        <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                            dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                            sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                        <a href="#" class="line-button">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex">
                        <div class="img_1">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/about/about_1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/about/about_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- offers_area_start -->
    <div class="offers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Our Offers</span>
                        <h3>On going Offers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/offers/1.png" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/offers/2.png" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/offers/3.png" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br>
                            rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- video_area_start -->
    <div class="video_area video_bg overlay">
        <div class="video_area_inner text-center">
            <span>Hoolulu Sea View</span>
            <h3>Relax and Enjoy your <br>
                Vacation </h3>
            <a href="https://www.facebook.com/ahmedshakib07" class="video_btn popup-video">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <!-- video_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb2 d-flex">
                        <div class="img_1">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/about/1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="<?= PROJECT_ROOT ?>frontview/img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Delicious Food</span>
                            <h3>We Serve Fresh and <br>
                                Delicious Food</h3>
                        </div>
                        <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                            dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                            sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                        <a href="#" class="line-button">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- features_room_startt -->
    <div class="features_room">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Featured Rooms</span>
                        <h3>Choose a Better Room</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_here">
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="<?= PROJECT_ROOT ?>frontview/img/rooms/1.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Superior Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="<?= PROJECT_ROOT ?>frontview/img/rooms/2.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Deluxe Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="<?= PROJECT_ROOT ?>frontview/img/rooms/3.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Signature Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="<?= PROJECT_ROOT ?>frontview/img/rooms/4.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Couple Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_room_end -->

    <!-- forQuery_start -->
    <div class="forQuery">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-md-12">
                    <div class="Query_border">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="Query_text">
                                    <p>For Reservation 0r Query?</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="phone_num">
                                    <a href="#" class="mobile_no">+880 1767 056733</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forQuery_end-->

    <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="single_instagram">
            <img src="<?= PROJECT_ROOT ?>frontview/img/instragram/1.png" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="<?= PROJECT_ROOT ?>frontview/img/instragram/2.png" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="<?= PROJECT_ROOT ?>frontview/img/instragram/3.png" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="<?= PROJECT_ROOT ?>frontview/img/instragram/4.png" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="<?= PROJECT_ROOT ?>frontview/img/instragram/5.png" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                address
                            </h3>
                            <p class="footer_text"> North Pirerbag, Raisa & Shikdhar Tower, Level-5, 3/8, <br>
                                Kamal Soroni Rd, Dhaka-1207.</p>
                            <a href="#" class="line-button">Get Direction</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Reservation
                            </h3>
                            <p class="footer_text"> +880 1767 056733 <br>
                                imtiaz.mysoftheaven@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navigation
                            </h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Newsletter
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Sign Up</button>
                            </form>
                            <p class="newsletter_text">Subscribe newsletter to get updates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-lg-9">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                                All rights reserved | Mysoftheaven (BD) Ltd. 
                                <i class="fa fa-heart-o" aria-hidden="true"></i> by 
                                <a href="https://mysoftheaven.com" target="_blank">Imtiaz Ahmed</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-xl-4 col-md-5 col-lg-3">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/ahmedshakib07">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/ahmedshakib07">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/ahmedshakib07">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- link that opens popup -->

    <!-- form itself end-->
        <form id="test-form" class="white-popup-block mfp-hide" method="POST" action="<?= PROJECT_ROOT ?>front/home">
                <div class="popup_box ">
                        <div class="popup_inner">
                            <h3>Check Availability</h3>
                            
                                <div class="row">

                                    <div class="col-xl-12">
                                        <input style="margin: 0 0 17px 0" type="text" id="default-select" class="form-control form-select wide" placeholder="Name" name="name" required>
                                    </div>

                                    <div class="col-xl-6">
                                        <input style="margin: 0 0 17px 0" type="text" id="default-select" class="form-control form-select wide" placeholder="Phone" name="phone" required>
                                    </div>

                                    <div class="col-xl-6">
                                        <input style="margin: 0 0 17px 0" type="email" id="default-select" class="form-control form-select wide" placeholder="Email" name="email" required>
                                    </div>

                                    <div class="col-xl-6">
                                        <input id="datepicker" placeholder="Check in date" name="checkIn" required>
                                    </div>

                                    <div class="col-xl-6">
                                        <input id="datepicker2" placeholder="Check out date" name="checkOut" required>
                                    </div>

                                    <div class="col-xl-6">
                                        <select class="form-select wide" id="default-select" name="adult" required>
                                            <option data-display="Adult">Adult</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6">
                                        <select class="form-select wide" id="default-select" name="children" required>
                                            <option data-display="Children">Children</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6">
                                        <select class="form-select wide" id="default-select" name="roomType" required>
                                            <option data-display="Room type">Room type</option>
                                            <option value="1">Single Room</option>
                                            <option value="2">Couple Room</option>
                                            <option value="3">Family Room</option>
                                        </select>
                                    </div>


                                    <!-- <h3>Extra</h3> -->
                                    <div class="col-xl-6 dropdown">
                                    
                                        <button class="form-select wide btn btn-info dropdown-toggle" type="button" id="sampleDropdownMenu default-select"
                                        data-toggle="dropdown" name="utility">
                                            Utility
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">
                                                <input name='u_id' type="checkbox" value="1">AC
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <input name='u_id' type="checkbox" value="2">Snacks
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <input name='u_id' type="checkbox" value="3">Swimming Pool
                                            </button>
                                        </div>
                                    
                                    </div>
                                        
                                    <!-- <h3>Extra End</h3> -->


                                    <div class="col-xl-12">
                                            <button name="submitBtn" type="submit" class="form-control boxed-btn3">Check Availability</button> 
                                    </div>

                                </div> 
                            
                        </div>
                    </div>
            </form>
    <!-- form itself end -->

    <!-- JS here -->
    <script src="<?= PROJECT_ROOT ?>frontview/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/popper.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/bootstrap.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/owl.carousel.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/isotope.pkgd.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/ajax-form.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/waypoints.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.counterup.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/scrollIt.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.scrollUp.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/wow.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/nice-select.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.slicknav.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/plugins.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?= PROJECT_ROOT ?>frontview/js/contact.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.form.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/jquery.validate.min.js"></script>
    <script src="<?= PROJECT_ROOT ?>frontview/js/mail-script.js"></script>

    <script src="<?= PROJECT_ROOT ?>frontview/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>
</body>
</html>
