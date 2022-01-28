<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from spark.bootlab.io/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 10:12:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
    <meta name="author" content="Maiza Bahaedinne">

    <title>Palmyra Hotels &amp; <?php echo $pageTitle ; ?></title>

    <!-- PICK ONE OF THE STYLES BELOW -->
     <link href="<?php echo base_url() ?>assets/css/modern.css" rel="stylesheet"> 
    <!-- <link href="<?php echo base_url() ?>assets/css/classic.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url() ?>assets/css/dark.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url() ?>assets/css/light.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- You can remove this after picking a style -->
    <style>
        body {
            opacity: 0;
        }
    </style>
    <script  src="<?php echo base_url() ?>assets/js/app.js"></script>
    <script  src="<?php echo base_url() ?>assets/js/settings.js"></script>
    
    <!-- END SETTINGS -->
<!-- Global site tag (gtag.js) - Google Analytics -->

</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <a class="sidebar-brand" href="<?php echo base_url() ?>">
               <img src="<?php echo base_url() ?>assets/img/brands/logo-1.png"  width="200px" > 
            </a>
            <div class="sidebar-content">
                <div class="sidebar-user">
                    <img src="<?php echo base_url() ?>assets/img/avatars/avatar.jpg" class="img-fluid rounded-circle mb-2" alt="<?php echo $name ?>" />
                    <div class="fw-bold"><?php echo $name ?></div>
                    <small><?php echo $role_text ?></small>
                    <br>
                    <?php if ($role != 1 ) { ?>
                    <small><?php foreach ($hotelsM as  $hotel ) { echo $hotel->name.'<br>' ; } ?> </small>
                    <?php } ?>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo base_url() ?>" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
                        </a>
                       
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#booking" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 far fa-fw fa-calendar-alt"></i> <span class="align-middle">Bookings</span>
                        </a>
                        <ul id="booking" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <?php foreach ($hotels as $hotel ) {
                                echo '<li class="sidebar-item"><a class="sidebar-link" href="'.base_url().'/Reservation/bookings/'.$hotel->hotelId.'">'.$hotel->name.'</a></li>' ;
                            }?>
                           
                            
                        </ul>
                       
                    </li>
                    <?php if ($role == 1 ) {  ?>
                    <li class="sidebar-item">
                        <a  class="sidebar-link collapsed" href="<?php echo base_url() ?>Users/clients">
                           <i class="align-middle me-2 fas fa-fw fa-address-book"></i> <span class="align-middle">Clients</span>
                        </a>
                     
                    </li>
                   <?php } ?>
                    

                    <li class="sidebar-header">
                        Elements
                    </li>
                   
                    
                    <li class="sidebar-item">
                        <a data-bs-target="#prices" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-heart"></i> <span class="align-middle">Hotels</span>
                        </a>
                        <ul id="prices" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <?php foreach ($hotels as $hotel ) {
                                echo '<li class="sidebar-item"><a class="sidebar-link" href="'.base_url().'/Hotel/edit/'.$hotel->hotelId.'">'.$hotel->name.'</a></li>' ;
                            }?>
                           
                            
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#bars" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle ion ion-md-wine me-2"></i> <span class="align-middle">Bars</span>
                        </a>
                        <ul id="bars" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <?php foreach ($bars as $bar ) {
                                echo '<li class="sidebar-item"><a class="sidebar-link" href="'.base_url().'/Bars/edit/'.$bar->barId.'">'.$bar->name.'</a></li>' ;
                            }?>
                           
                            
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a  class="sidebar-link collapsed" href="<?php echo base_url() ?>Saisons">
                           <i class="align-middle me-2 fas fa-fw fa-address-book"></i> <span class="align-middle">Saisons</span>
                        </a>
                     
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#hotels" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-heart"></i> <span class="align-middle">Prices</span>
                        </a>
                        <ul id="hotels" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <?php foreach ($hotels as $hotel ) {
                                echo '<li class="sidebar-item"><a class="sidebar-link" href="'.base_url().'/Prices/priceByHotel/'.$hotel->hotelId.'">'.$hotel->name.'</a></li>' ;
                            }?>
                           
                            
                        </ul>
                    </li>
                    
                    

                    <li class="sidebar-header">
                        Extras
                    </li>
                    <li class="sidebar-item">
                        <a  class="sidebar-link collapsed" href="<?php echo base_url() ?>Users">
                           <i class="align-middle me-2 fas fa-fw fa-address-book"></i> <span class="align-middle">Users</span>
                        </a>
                     
                    </li>
                </ul>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle d-flex me-2">
                    <i class="hamburger align-self-center"></i>
                </a>

                <form class="d-none d-sm-inline-block">
                    <input class="form-control form-control-lite" type="text" placeholder="Search projects...">
                </form>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-envelope-open"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        0 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <!--
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url() ?>assets/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Michelle Bilodeau">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Michelle Bilodeau</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                                <div class="text-muted small mt-1">5m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                   -->
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-bell"></i>
                                <span class="indicator"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    0 New Notifications
                                </div>
                                <div class="list-group">
                                    <!--
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-danger fas fa-fw fa-bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    -->
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-user"></i> View Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-comments"></i> Contacts</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-cogs"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>