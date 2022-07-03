<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>/web_assets/img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>/web_assets/img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/web_assets/img/favicon.png">
    <link rel="manifest" href="<?php echo base_url() ?>/web_assets/img/favicon_io/site.webmanifest">


    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/style.css"> 
    <title>Home</title>

</head>
<body>

  <!-- Navbar -->
    <header class="mainHeader">
        <div>
        <nav class="navbar navbar-expand-lg fixed-top custNav py-3 mxrcwidth">
            <a href="<?php echo base_url() ?>" class="navbar-brand text-uppercase font-weight-bold">
                <img src="<?php echo base_url() ?>/web_assets/img/home-page/logo.png" alt="">
            </a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars prime-color f30"></i></button>
                
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav navNavList mx-auto">
                        <li class="nav-item active"><a href="<?php echo base_url() ?>about-us" class="nav-link">About</a></li>
                       
                        <li class="nav-item"><a href="<?=base_url().'cancer'?>" class="nav-link">Cancer</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>diabetis" class="nav-link">Diabetis</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>blogs" class="nav-link">Blogs & News</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>contact-us" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>services" class="nav-link">Our Solution</a></li>
                       
                    </ul>
                   <ul class="list-unstyled topNavMob">
                       <li>
                           <i class="fa fa-phone pr-1"></i> + 022 6546543210
                       </li>
                   </ul>
     
                    <form class="navbar-form navbar-right navbar-form-search" role="search">
                        <div class="search-form-container hdn" id="search-input-container">

                            <div class="search-input-group">
                                <button type="button" class="btn btn-default topNavSearchClosebtn"
                                    id="hide-search-input-container"><i class="fa fa-close"
                                        aria-hidden="true"></i></button>
                                <div class="form-group">
                                    <input type="text" class="form-control topSearchInput" placeholder="Search for...">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" id="search-button"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </form>


                </div>

            </nav>
        </div>
    </header>
     <!--  -->

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">