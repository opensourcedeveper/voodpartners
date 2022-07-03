<?php $this->load->view('templates/web_header') ?>
 <section class="banner">
                <div class="mwidth">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 d-grid">
                            <div class="banner-head m-auto">
                                <h1>Personalized Strategic Suit,</h1>
                                <p>Modern business environment is more of ‘Buyers Market’ which comes with a complex business problem to overcome and achieve desired revenue mix where traditional strategies hardly fit to every enterprise. Tryangle standout in the Buyers Market with the design of innovative and unique strategies to help our clients gaining access to their potential growth possibilities. We believe personalization and customization is the key to the modern business age in designing the best fit strategy suit. Our Personalized Strategic Suit is an ecosystem where we assist our clients in designing a portfolio of strategic measures and allow exposure to achievable revenue figures in a visible and calculative manner.</p>
                                <div class="mt-5 pt-5">

                                    <div class="call-to-action text-center" style="margin-top: 50px;">
<!--       <form class="margin-clear"  method="get" action="https://strabayassociates.com/search" method="post">
 <input type="hidden" name="category" value="NULL">
                                            <div class="form-group has-feedback">
                                                <label class="sr-only" for="search_report"></label>   
                                                <input type="text" class="form-control form-control-lg" id="search_report"   name="search" placeholder="Search reports/keywords"  style="border: 1px solid #dfe8e5; width: 100%;">                   
                                            </div>
                                            <button type="submit" class="btn btn-lg prime-btn btn-animated ml-3" style="padding: 8px 20px"> Search <i class="fa fa fa-search"></i>
                                            </button>
                                        </form> -->
                                    </div>

                                    <!-- <a href="report-listing.html" class="prime-btn">All Reports</a> -->
                                    <!-- <a href="#" class="sec-btn ml-3 scrollLink">BLOGS</a> -->

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            
                            <div id="demo" class="carousel slide hide-mob" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                    <li data-target="#demo" data-slide-to="3"></li>
                                  
                                </ul>
                                
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo base_url() ?>/web_assets/img/banner.jpg" alt="research front" class="w-100" height="550">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url() ?>/web_assets/img/banner10.jpg" alt="research back" class="w-100" height="550">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url() ?>/web_assets/img/banner20.jpg" alt="research back" class="w-100" height="550">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url() ?>/web_assets/img/banner21.jpg" alt="research back" class="w-100" height="550">
                                </div>
                                </div>
                                
                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!--  -->


                <!--  -->
            <section class="hmReportListSec bg-prime mt-5">
                <div class="mwidth">
                    <div>
                        <h2 class="text-center p-5 rf-content">Our Latest Reports <span class="prime-color"></span> </h2>
                    </div>
                    <div class="row">  <?php if ($letestReports): ?>
                                <?php foreach ($letestReports as $letestReport): ?>
                        <div class="col-md-6 col-sm-12">
                          
                            <div class="hmRListSingle ">
                                <a href="#" class="prime-color"><?=substr(strip_tags($letestReport['title']),0,150)?> </a>
                                <p> Pages :<span class="font-weight-bold"> <?=$letestReport['pages'];?></span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span></p>
                                <p><?=substr($letestReport['report_desc'], 0, 300).' ...' ?></p>
                                <div class="d-felx"> 
                                     <a href="<?=base_url()?>reportsdetails/<?=strtolower($letestReport['slug']) ?>" class="font-weight-bold ml-4">Get Details</a></div>
                            </div>
                            <hr>
                         <!--   
                            <div class="hmRListSingle">
                                <a href="#" class="prime-color">Global Nuclear Imaging System and Equipment Market</a>
                                <p> Pages :<span class="font-weight-bold"> 130</span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span></p>
                                <p>Increase in incidence of chronic diseases such as cardiac disorders, cancer, and neurological disorders, technological advancements, and rise in awareness about the early diagnosis have fueled the growth of the medical imaging systems market.</p>
                                <div class="d-felx"><a href="#" class="font-weight-bold">Instant Buy</a> <a href="#" class="font-weight-bold ml-4">Get Details</a></div>
                            </div> 
                            <hr>    <div class="hmRListSingle">
                                <a href="#" class="prime-color">Global Nuclear Imaging System and Equipment Market</a>
                                <p> Pages :<span class="font-weight-bold"> 130</span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span></p>
                                <p>Increase in incidence of chronic diseases such as cardiac disorders, cancer, and neurological disorders, technological advancements, and rise in awareness about the early diagnosis have fueled the growth of the medical imaging systems market.</p>
                                <div class="d-felx"><a href="#" class="font-weight-bold">Instant Buy</a> <a href="#" class="font-weight-bold ml-4">Get Details</a></div>
                            </div>
                            <hr> -->

                        </div>    <?php endforeach ?>
                         <?php endif ?>
                          <!--   <div class="col-md-6 col-sm-12">
                            <div class="hmRListSingle">
                                <a href="#" class="prime-color">Global Nuclear Imaging System and Equipment Market</a>
                                <p> Pages :<span class="font-weight-bold"> 130</span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span></p>
                                <p>Increase in incidence of chronic diseases such as cardiac disorders, cancer, and neurological disorders, technological advancements, and rise in awareness about the early diagnosis have fueled the growth of the medical imaging systems market.</p>
                                <div class="d-felx"><a href="#" class="font-weight-bold">Instant Buy</a> <a href="#" class="font-weight-bold ml-4">Get Details</a></div>
                            </div>
                            <hr>
                          <div class="hmRListSingle">
                                <a href="#" class="prime-color">Global Nuclear Imaging System and Equipment Market</a>
                                <p> Pages :<span class="font-weight-bold"> 130</span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span></p>
                                <p>Increase in incidence of chronic diseases such as cardiac disorders, cancer, and neurological disorders, technological advancements, and rise in awareness about the early diagnosis have fueled the growth of the medical imaging systems market.</p>
                                <div class="d-felx"><a href="#" class="font-weight-bold">Instant Buy</a> <a href="#" class="font-weight-bold ml-4">Get Details</a></div>
                            </div>
                            <hr>
                           <div class="hmRListSingle">
                                <a href="#" class="prime-color">Global Nuclear Imaging System and Equipment Market</a>
                                <p> Pages :<span class="font-weight-bold"> 130</span> | Category : <span class="font-weight-bold"> Chemical Material</span> | CAGR : <span class="font-weight-bold">3.8 % </span> </p>
                                <p>Increase in incidence of chronic diseases such as cardiac disorders, cancer, and neurological disorders, technological advancements, and rise in awareness about the early diagnosis have fueled the growth of the medical imaging systems market.</p>
                                <div class="d-felx"><a href="#" class="font-weight-bold">Instant Buy</a> <a href="#" class="font-weight-bold ml-4">Get Details</a></div>
                            </div> 
                            <hr> 
                            
                        </div> -->
                </div>
                <p class="text-right hmallbtn">
                    <a href="<?=base_url('reports')?>"><span class="prime-color"> All Reports</span> </a>
                </p>
            </section>
            <!--  -->

    
            <!--  -->
            <div class="mwidth pt-5 mt-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <div class="top">
                            <span class="op05"></span>
                            <h3>Our all <span class="prime-color"> Papers</span></h3>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
              <!--  -->
              <section class="mt-5">
                <div class="mwidth">
                    <!-- <div>
                        <h2 class="text-center p-5">All <span class="prime-color">Papers</span> </h2>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h3 class="text-center op05 pt-3 pb-3">Press Release</h3>
                                <?php if ($press_release): ?>
                                            <?php foreach ($press_release as $press_release): ?>

                                    <div class="hmprSingle">
                                 <div class="pb-4">
                                    <img src="<?= base_url() ?>uploads/pressrelease/<?=$press_release['image']?>" alt="" style="height: 350px;" class="w-100">
                                 </div>
                                  
                                    <a href="<?= base_url() ?>press-release/<?= strtolower($press_release['slug'])  ?>" class="prime-color"><?=$press_release['title']?></span></p>
                                    <p><?=substr($press_release['description'], 0, 450).' ...' ?></p>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                             
                                <p class="text-right hmallbtn">
                                    <a href="<?= base_url() ?>press-releases"><span class="prime-color"> All Press Release</span> </a>
                                </p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h3 class="text-center op05 pt-3 pb-3">Blogs & Articles</h3>


                              <?php if ($blogs): ?>
                                            <?php foreach ($blogs as $blog): ?>

                                <div class="d-flex hmBlogSingle">
                                <div class="w-75 p-3 ">
                                    <a href="<?= base_url() . 'blog/' . strtolower($blog['slug']) ?>" class="prime-color f19"><?=substr($blog['title'], 0, 650).' ...' ?></a>
                                    <p><span class="op05"><?=$blog['created_at']?></span></p>
                                </div>
                                <div class="w-25 p-3align-self-right">
                                    <img src="<?php echo base_url().'uploads/' ?>blogs/<?=$blog['image']?>" alt="" class="">
                                </div>
                            </div>
                            <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                        <!--     <div class="d-flex hmBlogSingle">
                                <div>
                                    <a href="#" class="prime-color f19">Apple Tv's American science fiction drama television series See</a>
                                    <p><span class="op05">los Angeles 18th Oct, 2021.</span></p>
                                </div>
                                <div class="pl-3 align-self-center">
                                    <img src="<?php echo base_url() ?>/web_assets/img/blog1.jpg" alt="" class="">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex hmBlogSingle">
                                <div>
                                    <a href="#" class="prime-color f19">  Tom Hardy will be back for a second series, the BBC has confirmed.</a>
                                    <p><span class="op05">los Angeles 18th Oct, 2021.</span></p>
                                </div>
                                <div class="pl-3 align-self-center">
                                    <img src="<?php echo base_url() ?>/web_assets/img/blog2.jpg" alt="" class="">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex hmBlogSingle">
                                <div>
                                    <a href="#" class="prime-color f19">Ragnar Lothbrok or Lodbrok is a legendary Viking hero, as well as a legendary Danish and Swedish king</a>
                                    <p><span class="op05">los Angeles 18th Oct, 2021.</span></p>
                                </div>
                                <div class="pl-3 align-self-center">
                                    <img src="<?php echo base_url() ?>/web_assets/img/blog3.jpg" alt="" class="">
                                </div>
                            </div>
                            <hr> -->
                            <p class="text-right hmallbtn">
                                <a href="<?= base_url() ?>blogs"><span class="prime-color"> All Blogs</span> </a>
                            </p>
                        </div>
                    </div>
                  
            </section>
            <!--  -->
<!-- Main Heading -->
        <div class="mwidth pt-5 mt-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="top">
                        <span class="op05">What we provide</span>
                        <h3>Our Services <span class="prime-color"> and Support</span></h3>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
<!--  -->
            <section class="rfeature bg-prime mt-1" >
                <div class="mwidth ">
                    <div class="row ">
                        <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                            <div class="rf-content m-auto">
                                <i class="fa fa-book"></i>
                                <h2>Syndicated Market Reports</h2>
                                <p>We recognize over many verticals for an effective marketing strategy, planning and R&D phase for a detailed representation of the market. Our reports offer a highly customized analysis of niche areas that could impact all industry verticals. With our data bank, you have a number of options to choose from, which are validated with stringent research methodologies by our analysts to provide the best research solutions to our clients. The report provides a detailed description of the market based on regional and product basis.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12 d-grid">
                            <div class="rf-content m-auto">
                                <i class="fa fa-bar-chart"></i>
                                <h2>Customized Research Program</h2>
                                <p>There are certain times when you would require a report based on your specific needs or requirements. We offer a tailor-made study focusing on your particular segment specifications within a broader spectrum. Our research analysts will analyze your niche portfolio of the industry, region wise and offer you suitable customized research study proposals. The customized reports are prepared by our professionals after reviewing the exact requirements of the clients to provide effective and reliable study within the proposed time frame.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12 d-grid">
                            <div class="rf-content m-auto">
                                <i class="fa fa-phone"></i>
                                <h2>Domain-specific analytics</h2>
                                <p>We are backed by a team of dedicated research enthusiasts, who strive hard to provide efficient and effective services which are based on your area of interest. Our team will identify growth opportunities and market obstacles based on significant current and historical market trends, it will help you to make factual decisions. Our team facilitates the smooth and streamlined execution of all the requirements mentioned by you to be examined in the report that with error-free services.</p>
                            </div>
                        </div>  
                            </div>
                </div> <div class="mwidth ">
                    <div class="row ">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-grid">
                            <div class="rf-content m-auto">
                                <i class="fa fa-internet-explorer"></i>
                                <h2>Consulting</h2>
                                <p>Our consulting services help you apply the right approach that can lead your business to the pinnacle of success. Additionally, our economical solutions will help you to prioritize remunerative opportunities. Our customized reports take corporate and business-level consulting expertise to steer the growth status in the prominent enterprises in the world. Our business consulting proficiencies are backed by our holistic market approach by our able team of economists and professional domain-specific market research analysts. We study the perfect factors from the several industry professionals and decision makers we come by on various platforms and thorough information verified by reliable means.</p>
                            </div>
                        </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-grid">
                            <div class="rf-content m-auto">
                                <i class="fa fa-internet-explorer"></i>
                                <h2>Subscription</h2>
                                <p>Cost saving is the primary goal of any organization and when it comes to getting insights on the industry verticals – it is the top priority. We offer economical subscription services to access you to meet the requirements you need. We are also concerned about your product lifecycle management, hence we embarked the report to be used for a long period of time. With the emerging dynamic business environment, it is necessary for the reports to be innovative, cost-saving, and flexible to fulfill business goals.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  -->

            <div class="mwidth pt-5 mt-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="top">
                            <span class="op05">Our best features</span>
                            <h2 class="">Our Happy <span class="prime-color">Clients</span> </h2>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clients">
                <div class="mwidth">
                    <div class="row">
                        <div class="col">
                            <div class="clients_slider_container">
                                <div class="owl-carousel owl-theme clients_slider">

                            <?php if ($clients): ?>
                            <?php foreach ($clients as $client): ?>
                                    <div class="owl-item">
                                <div class="clients_item d-flex flex-column justify-content-center">
                                <img src="<?php echo base_url().'uploads/' ?>clients/<?=$client['img']?>" class="img-responsive" width="170" height="72" alt="<?=$client['name']?>">
                                </div>
                                </div>
                                        <?php endforeach ?>
                            <?php endif ?>
                                  <!--   <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_1.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_2.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_4.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_5.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_3.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_6.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_7.jpg" alt=""></div>
                                    </div>
                                    <div class="owl-item">
                                        <div class="clients_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_8.jpg" alt=""></div>
                                    </div> -->
                                </div> <!-- clients Slider Navigation -->
                                <div class="clients_nav clients_prev"><i class="fa fa-chevron-left"></i></div>
                                <div class="clients_nav clients_next"><i class="fa fa-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- 
            <div class="mwidth mb-5">
                <div class="card col-md-12 mt-2 testicard">
                    <div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel" data-interval="100000">
                      <div class="w-100 carousel-inner mb-1" role="listbox">
                            <div class="carousel-item active">
                              <div class="bg"></div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="carousel-caption">
                                            <div class="row">
                                              
                                              <div class="col-sm-12 col-12 testimonialSingle">
                                              <h2 class="prime-color">Micheal Smith - <span>Web Developer</span></h2>
                                                <p>Well incremented. Comes with recommended workout. I'm using it to help with bladder leakage issues that I've been experiencing since a recent vasectomy.</p>
                                        
                                              </div>
                                            </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="carousel-caption">
                                            <div class="row">
                                           
                                              <div class="col-sm-12 col-12 testimonialSingle">
                                                <h2 class="prime-color">Helena Doe - <span>Architect</span></h2>
                                                <p>Well incremented. Comes with recommended workout. I'm using it to help with bladder leakage issues that I've been experiencing since a recent vasectomy.</p>
                                        
                                              </div>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <div class="bg"></div>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="carousel-caption">
                                          <div class="row">
                                            
                                            <div class="col-sm-12 col-12 testimonialSingle">
                                            <h2 class="prime-color">Micheal Smith - <span>Web Developer</span></h2>
                                              <p>Well incremented. Comes with recommended workout. I'm using it to help with bladder leakage issues that I've been experiencing since a recent vasectomy.</p>
                                      
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="carousel-caption">
                                          <div class="row">
                                         
                                            <div class="col-sm-12 col-12 testimonialSingle">
                                              <h2 class="prime-color">Helena Doe - <span>Architect</span></h2>
                                              <p>Well incremented. Comes with recommended workout. I'm using it to help with bladder leakage issues that I've been experiencing since a recent vasectomy.</p>
                                      
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
              </div> 
            </div> -->
            <!--  -->

<?php $this->load->view('templates/web_footer') ?>
