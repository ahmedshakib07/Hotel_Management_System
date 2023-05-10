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


<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        HOOLULU : Admin
    
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= PROJECT_ROOT ?>css/styles.css"  rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">HOTEL HOOLULU</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="<?= PROJECT_ROOT ?>admin/login">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">

            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Core</div>

                            <a class="nav-link" href="<?= PROJECT_ROOT ?>admin/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link collapsed" href="<?= PROJECT_ROOT ?>admin/rooms">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Rooms
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                            <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Add New Room</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Edit Room</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Delete Room</a>
                                </nav>
                            </div> -->

                            <a class="nav-link collapsed" href="<?= PROJECT_ROOT ?>admin/booking">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Booking
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>

                            <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Active
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>

                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Single</a>
                                            <a class="nav-link" href="register.html">Double</a>
                                            <a class="nav-link" href="register.html">Family</a>
                                        </nav>

                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Pending
                                        <div class="sb-sidenav-collapse-arrow"></i></div>
                                    </a>

                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Single</a>
                                            <a class="nav-link" href="register.html">Double</a>
                                            <a class="nav-link" href="404.html">Family</a>
                                        </nav>
                                    </div>

                                </nav>
                            </div> -->

                            <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="tables.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Data Table
                                </a>
                                <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sitemap"></i></div>
                                    Revenue
                                </a>

                                <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-line-chart"></i></div>
                                    Charts
                                </a>
                            </div>
                        </div>

                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as</div>
                            Admin Administrator
                        </div>

                    <!-- </div>
                </div> -->
            </nav>

        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">


    <!-- form itself start-->
        <form id="test-form" class="white-popup-block mfp-hide" method="POST" action="<?= PROJECT_ROOT ?>admin/editRoom/<?= $data['id'] ?>">
                <div class="popup_box">
                        <div class="popup_inner">
                            
                            <h3>Edit Rooms</h3>
                            
                                <div class="row">

                                    <div class="col-xl-12">
                                        <select style="margin: 0 0 17px 0" class="form-select wide" id="default-select" name="roomTypeId" value="<?=$data['roomTypeId']?>">
                                            <option data-display="Room type">Room type</option>
                                            <option value="1">Single Room</option>
                                            <option value="2">Couple Room</option>
                                            <option value="3">Family Room</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6">
                                        <input style="margin: 0 0 17px 0" type="text" id="default-select" class="form-control" placeholder="Roon No." name="roomNo" value="<?=$data['roomNo']?>">
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <input style="margin: 0 0 17px 0" id="datepicker" class="form-control" placeholder="Created date" name="created_date" value="<?=$data['created_date']?>">
                                    </div>

                                    <div class="col-xl-12">
                                        <button name="submitBtn" type="submit" class="form-control boxed-btn3">Save</button> 
                                    </div>
                                </div>
                            
                        </div>
                    </div>
            </form>
    <!-- form itself end -->
    
    <!-- JS here -->
    <script src="frontview/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="frontview/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="frontview/js/popper.min.js"></script>
    <script src="frontview/js/bootstrap.min.js"></script>
    <script src="frontview/js/owl.carousel.min.js"></script>
    <script src="frontview/js/isotope.pkgd.min.js"></script>
    <script src="frontview/js/ajax-form.js"></script>
    <script src="frontview/js/waypoints.min.js"></script>
    <script src="frontview/js/jquery.counterup.min.js"></script>
    <script src="frontview/js/imagesloaded.pkgd.min.js"></script>
    <script src="frontview/js/scrollIt.js"></script>
    <script src="frontview/js/jquery.scrollUp.min.js"></script>
    <script src="frontview/js/wow.min.js"></script>
    <script src="frontview/js/nice-select.min.js"></script>
    <script src="frontview/js/jquery.slicknav.min.js"></script>
    <script src="frontview/js/jquery.magnific-popup.min.js"></script>
    <script src="frontview/js/plugins.js"></script>
    <script src="frontview/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="frontview/js/contact.js"></script>
    <script src="frontview/js/jquery.ajaxchimp.min.js"></script>
    <script src="frontview/js/jquery.form.js"></script>
    <script src="frontview/js/jquery.validate.min.js"></script>
    <script src="frontview/js/mail-script.js"></script>

    <script src="frontview/js/main.js"></script>
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
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= PROJECT_ROOT ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= PROJECT_ROOT ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= PROJECT_ROOT ?>assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= PROJECT_ROOT ?>js/datatables-simple-demo.js"></script>

</body>
</html>
