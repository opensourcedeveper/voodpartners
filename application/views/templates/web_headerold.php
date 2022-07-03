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
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/web_assets/css/live.css">
    <title>Home</title>

</head>
<body>
     
   
    <!-- Header -->
        <header>
            <!--  -->
            <section class="topBar">
                <div class="mwidth">
                    <div class="row pl-0 pr-0">
                        <div class="col-xl-12 ml-0 mr-0 pl-0 pr-0">
                            <div class="tb-left">
                                <ul>
                                    <li>
                                        <i class="fa fa-envelope"></i> <a href="mailto:sales@strabayassociates.com" class=""> sales@strabayassociates.com</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i> Phone: <a href="" class="">(+1) 631 623 7311</a>
                                    </li>
                                <!--     <li>
                                       <a href="" class="ml-2 op05"><i class="fa fa-facebook"></i></a>
                                       <a href="" class="ml-2 op05"><i class="fa fa-twitter"></i></a>
                                         <a href="" class=" ml-2 op05"><i class="fa fa-instagram"></i></a>
                                    </li> -->
                                 <!--    <li>
                                        <i class="fa fa-phone font-weight-bold"></i>
                                        <a href="#" data-toggle="modal" data-target="#assistanceModal" class=""> Get Instant Assistance</a>
                                       
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  -->

            <section class="menuBar">
                <div class="mwidth">
                    <b class="screen-overlay"></b>




                    <form  method="get" action="<?= base_url() ?>search" method="post"  class="form-inline my-2 my-lg-0 mobsearch"> 
                        <input class="form-control mr-sm-2" id="search_report" <?php if (isset($searchFor)) echo 'value="' . $searchFor . '"'; ?>  name="search"  placeholder="search Reports here..."> 
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                     </form>
                    <button data-trigger="#navbar_main" class="d-lg-none btn  collapsebtn" type="button"> 
                         <i class="fa fa-bars"></i>
                         </button>






 
                    <a class="navbar-brand offcanBrand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>web_assets/img/logo.png" class="img-responsive" alt="Tryangle " width="250" height="50"></a>  
                   

                    <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-md pr-0 pl-0">
                      <a class="navbar-brand" href="<?php echo base_url() ?>">  <img src="<?php echo base_url() ?>web_assets/img/logo.png" class="img-responsive" alt="Tryangle " width="250" height="50"  ></a>  
                    <div class="offcanvas-header">  
                        <button class="btn btn-default bg-prime btn-close float-right"> X </button>
                        <h5 class="py-2 text-white">Main navbar</h5>
                    </div>
                      
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link scrollLink" href="<?=base_url().'reports'?>">Latest Reports</a></li> 
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link dropdown-toggle scrollLink" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                            <div class="dropdown-menu rounded-0 bg-light w-50 border-0 m-0 p-0 shadow-sm" aria-labelledby="navbarDropdown">
                            <div class="container">
                                <div class="row top-megamenu">
                                        <div class="col-md-12">
                                                   <div>
                                           <ul>
                                                <?php if ($categories): ?>
                                                    <?php foreach ($categories as $category): ?>
                                                        <li><a href="<?=base_url().'categories/'.$category['slug']?>"><?=$category['name']  ?></a></li>  
                                                     
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </ul>
                                            </div>
                                        </div>
                              
                                    </div>
                                </div>
                            </div>
                        </li>
                   <!--      <li class="nav-item dropdown NavMenupapersLi"><a class="nav-link scrollLink dropdown-toggle" id="papersDrop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Papers</a>
                            <div class="dropdown-menu" aria-labelledby="papersDrop">
                            <ul class=" rounded-0 bg-light w-100 border-0 m-0 p-0 shadow-sm" > 

                                  <li><a  class="dropdown-item" href="<?php echo base_url() ?>press-releases">Press Release</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url() ?>blogs">Blogs</a></li> 
                              </ul>
                            </div>
                        </li> -->
                        <li class="nav-item"><a class="nav-link scrollLink" href="<?php echo base_url() ?>press-releases"> Press Release</a></li>
                        <li class="nav-item"><a class="nav-link scrollLink" href="<?php echo base_url() ?>blogs">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link scrollLink" href="<?php echo base_url() ?>about-us"> About us  </a></li>
                       <li class="nav-item"><a class="nav-link scrollLink" href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                    </ul>
              <form  method="get" action="<?php echo base_url() ?>search" method="post" class="form-inline my-2 my-lg-0 desksearch"> 
                 <input type="hidden" name="category" value="NULL">
                    <input class="form-control mr-sm-2" type="text"   id="search_report"   name="search" placeholder="search Reports here..."> 
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                 </form>
                    </nav>
                  
    
                </div>
            </section>
            <!--  -->
        </header>