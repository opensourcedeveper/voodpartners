<?php $this->load->view('templates/web_header') ?>

<!-- Banner -->
<!--      <div class="bannerimage">
         <div class="mxrcwidth">
            <div class="row">

                <div class="bannerText text-center">
                    <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Frame-3.png" alt="">
                    <h1 class="heading pt-3">We Create Value And <br>Build Your Confidence</h1>
                    <p>Get the Pulse of Target Market With our Methodical Research! </p>
                </div>
             </div>
         </div>
     
     </div> -->
     <!--  -->
     <section class="bannervideo">
        <div class="wrapper1">
            <video class="wrapper-video" src="<?php echo base_url() ?>/web_assets/video/video1.mp4" id="video" autoplay="" muted="" playsinline=""></video>
            <!-- <video class="wrapper-video" src="<?php echo base_url() ?>/web_assets/video/video2.mp4" id="video" autoplay="" muted="" playsinline=""></video> -->
            <div class="overlay">
            </div>
        </div>
    </section>

    <section id="menu1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5 pt-5">
                   <h1 id="first-heading" class="first-heading pt-3">We Create Value And <br>Build Your Confidence</h1>
                   <p class="font-18 mt-3 clr-white" id="sub-heading">Get the Pulse of Target Market With our Methodical Research! </p> <p>&nbsp </p>   <p>&nbsp </p>  <p>&nbsp </p>   <p>&nbsp </p>  <p>&nbsp </p>   <p>&nbsp </p>  <p>&nbsp </p> 
               </div>
           </div>
       </div>
   </div>
   <!-- Our Solutions -->
   <section class="ourSolutions ourSolutionsBg" >
    <div class="mxrcwidth ourSolutionsBg">
        <div class="head ourSolutionsBg">
            <h2 class="text-center pt-3 pb-3 ">Our Solutions</h2>
            <p class="f18 pt-3 pb-5 text-center">Lorem ipsu inventore sequi saepe vitae deserunt eum voluptates magni dolore, provident exercitationem animi molestias sapiente asperiores tempore! Dicta ad quod repudiandae.</p>
        </div>
        <h3 class="text-center pt-5 pb-2">Future Of</h3>
        <div class="hmSolutionTabs">
            <ul id="tabs" class="nav nav-tabs mainUl mb-2 row" role="tablist">
                <li class="nav-item mainLi col">
                    <a id="tabPA" href="#panePA" class="nav-link active" data-toggle="tab" role="tab">
                        <div>
                            <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Frame.png" alt="">
                            <h3>Pipeline Analysis</h3>
                        </div>
                    </a>
                </li>
                <li class="nav-item mainLi mainLi2 col">
                    <a id="tabOA" href="#paneOA" class="nav-link" data-toggle="tab" role="tab">
                        <div>
                            <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Frame.png" alt="">
                            <h3>Opportunity Analysis</h3>
                        </div>
                    </a>
                </li>
                <li class="nav-item mainLi col">
                    <a id="tabMA" href="#paneMA" class="nav-link" data-toggle="tab" role="tab">
                        <div>
                            <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Frame.png" alt="">
                            <h3> Market Analysis</h3>
                        </div>
                    </a>
                </li>
            </ul>


            <div id="content" class="tab-content ourSolutionsBg" role="tablist">
                <div id="panePA" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tabPA">
                    <div class="card-header" role="tab" id="headingPA">
                        <h5 class="mb-0">
                            <!-- Note: `data-parent` removed from here -->
                            <a data-toggle="collapse" href="#collapsePA" aria-expanded="true" aria-controls="collapsePA">
                                Pipeline Analysis
                            </a>
                        </h5>
                    </div>

                    <!-- Note: New place of `data-parent` -->
                    <div id="collapsePA" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="headingPA">
                        <div class="card-body pl-0 pr-0 pt-5 pb-5 ourSolutionsBg" >


                            <div class="hmInnerTabs row">
                                <ul id="tabs" class="nav nav-tabs col-4" role="tablist">
                                    <li class="nav-item">
                                        <a id="innerPAtab" href="#innerpanePA" class="nav-link active" data-toggle="tab" role="tab">
                                         <i class="fa fa-gear pr-5"></i>
                                         <span> Insights</span> 

                                     </a>
                                 </li>
                                 <li class="nav-item">
                                    <a id="innerOAtab" href="#innerOApane" class="nav-link" data-toggle="tab" role="tab">
                                        <i class="fa fa-gear pr-5"></i>
                                        <span> Strategy</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="innerMatab" href="#innerMapan" class="nav-link" data-toggle="tab" role="tab">
                                        <i class="fa fa-gear pr-5"></i>
                                        <span> Market Future</span> 
                                    </a>
                                </li>
                            </ul>


                            <div id="content" class="tab-content col-8" role="tablist">
                                <div id="innerpanePA" class="card tab-pane fade show active h-100" role="tabpanel" aria-labelledby="innerPAtab">
                                    <div class="card-header" role="tab" id="innerPAHead">
                                        <h5 class="mb-0">

                                            <a data-toggle="collapse" href="#innerPaColl" aria-expanded="true" aria-controls="innerPaColl">
                                                Collapsible Group Item A
                                            </a>
                                        </h5>
                                    </div>
                                    

                                    <div id="innerPaColl" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="innerPAHead">
                                        <div class="card-body mt-2">
                                            <ul class="list-style-sqaure">
                                                <li>

                                                    <h3>Which products can push the market growth?</h3>

                                                </li>
                                                <li>
                                                    <h3>Which are upcoming companies & products?</h3>


                                                </li>
                                                <li>
                                                    <h3>Why the drug Failed or Passed?</h3>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div id="innerOApane" class="card tab-pane fade h-100" role="tabpanel" aria-labelledby="innerOAtab">
                                    <div class="card-header" role="tab" id="innerOAHead">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#innerOAColl" aria-expanded="false" aria-controls="innerOAColl">
                                                Collapsible Group Item B
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="innerOAColl" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="innerOAHead">
                                        <div class="card-body">
                                          <ul class="list-style-sqaure">
                                            <li>

                                                <h3>Which are the untapped markets?</h3>


                                            </li>
                                            <li>
                                                <h3>Which regulations will support or hinder the market?
                                                </h3>


                                            </li>
                                            <li>
                                                <h3>Which are the competetive products?
                                                </h3>
                                            </li>
                                            <li>
                                                <h2>Solutions from VOODs Partners
                                                </h2>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="innerMapan" class="card tab-pane fade h-100" role="tabpanel" aria-labelledby="innerMatab">
                                <div class="card-header" role="tab" id="innerMAHead">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#innerMaColl" aria-expanded="false" aria-controls="innerMaColl">
                                            Collapsible Group Item C
                                        </a>
                                    </h5>
                                </div>
                                <div id="innerMaColl" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="innerMAHead">
                                    <div class="card-body">
                                      <ul class="list-style-sqaure">
                                        <li>

                                            <h3>How to grab the huge untapped market?

                                            </h3>

                                        </li>
                                        <li>
                                            <h3>Which companies will led the future?
                                            </h3>


                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Upcoming Competitors

                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Competetive Beanchmarking


                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Oppurtinity Identification

                                            </h3>
                                        </li>

                                        <li>
                                            <h3>Market Attractiveness and Oppurtinity


                                            </h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  </div>
        </div>
    </div>

    <div id="paneOA" class="card tab-pane fade" role="tabpanel" aria-labelledby="tabOA">
        <div class="card-header" role="tab" id="headingOA">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseOA" aria-expanded="false" aria-controls="collapseOA">
                    Opportunity Analysis
                </a>
            </h5>
        </div>
        <div id="collapseOA" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="headingOA">
            <div class="card-body">
               <ul class="list-style-sqaure">
                                        <li>

                                            <h3>How to grab the huge untapped market?

                                            </h3>

                                        </li>
                                        <li>
                                            <h3>Which companies will led the future?
                                            </h3>


                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Upcoming Competitors

                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Competetive Beanchmarking


                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Oppurtinity Identification

                                            </h3>
                                        </li>
                                        
                                        <li>
                                            <h3>Market Attractiveness and Oppurtinity


                                            </h3>
                                        </li>
                                    </ul>
            </div>
        </div>
    </div>

    <div id="paneMA" class="card tab-pane fade" role="tabpanel" aria-labelledby="tabMA">
        <div class="card-header" role="tab" id="headingMA">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseMA" aria-expanded="false" aria-controls="collapseMA">
                    Market Analysis
                </a>
            </h5>
        </div>
        <div id="collapseMA" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="headingMA">
            <div class="card-body">
               <ul class="list-style-sqaure">
                                        <li>

                                            <h3>How to grab the huge untapped market?

                                            </h3>

                                        </li>
                                        <li>
                                            <h3>Which companies will led the future?
                                            </h3>


                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Will existing company face the competetion?
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Upcoming Competitors

                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Competetive Beanchmarking


                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Oppurtinity Identification

                                            </h3>
                                        </li>
                                        
                                        <li>
                                            <h3>Market Attractiveness and Oppurtinity


                                            </h3>
                                        </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</section>
<!--  -->





<!-- About US -->
<section class="aboutSec">
 <div class="mxrcwidth">
     <div class="row pt-4 pb-4">
         <div class="col-md-6 col-sm-12">
             <div class="abLeft">
                 <h2 class="font-weight-bold">About Us</h2>
                 <!-- <h3>Lorem ipsum dolor sit amet.</h3> -->
                 <p class="pt-4">    VOOD Partners is a business consulting and advisory solution provider operating with the intent of driving change. We are a team of multidisciplinary professionals operating in a niche segment of Diabetic and Cancer related practices. Our major focus is on monitoring emerging technologies, analyzing markets, mapping trends, strategizing growth triggering actions, and helping companies to implement these plans. By applying machine + mind approaches, we produce a data driven eco-system of actionable insights and go-to market strategies to create a stream of innovative growth opportunities for companies, government, healthcare policy market, and investors.</p>
                 <p  > 
                    We at VOOD (Value out of Data) Partners operate with the simple aim of adding value to people’s lives, therefore we serve companies, governments, investors, and policy makers that deal in Cancer and Diabetic care. Providing Value-out-of-Data (VOOD) is what we stand for. Our value creation and engagement model starts with serving companies operating in these disease care in order to bring the best fit solution for people and create impact.   
                </p>
                <p  > 
                    We are specialists in the process of gathering data, analyzing it, and producing impact generating results. We understand the science behind the data and therefore our research efforts are driven by simplifying business complexities that leads to real growth. As a team we choose to be a catalyst as well as partner to businesses by guiding them in a future shaped by growth.

                </p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="abcards">

                <div class="card" style="width: 18rem;">
                    <i class="fa fa-hand-o-right"></i>
                    <div class="card-body">
                      <h5 class="card-title">Cancer</h5>
                      <p class="f20 font-weight-bold">Lorem ipsum dolor sit.</p>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="<?=base_url().'cancer'?>" class="">
                          <img  src="<?php echo base_url() ?>/web_assets/img/home-page/arrow.png" alt="">
                      </a>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                <i class="fa fa-hand-o-right"></i>
                <div class="card-body">
                  <h5 class="card-title">Diabetes</h5>
                  <p class="f20 font-weight-bold">Lorem ipsum dolor sit.</p>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="<?=base_url().'diabetis'?>" class="">
                    <img  src="<?php echo base_url() ?>/web_assets/img/home-page/arrow.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!--  -->

<!-- Clients -->
<section class="clients">
    <div class="mxrcwidth">
        <div class="row">
            <div class="col-md-6 col-sm-12 align-self-center">
                <div class="clientInfo">
                    <h2 class="mainHeadings">
                        Our Clients
                    </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia blanditiis ab fugit. Excepturi, nobis assumenda ab hic repudiandae in dolorum illum inventore, repellat, corporis nisi quod. Iste exercitationem aspernatur quos.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Jerry-Piping-bw-oyl3forlrwur6778abi56lm69f24r157w64c9y75z4 1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Jrango-Glasses-bw-oyl3fi6qg2lqwxgscqnr759y3pyk95f3j9jxx0gx6o 1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Korane-Scents-bw-oyl3fj4kmwn18jff792drn1ep3txguitve7feafj0g 1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/LeeveOn-Branding-bw-oyl3fl090kplvrcow9vmwmkbvvknw8qajniecucqo0 1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Nadine-Ghaida-bw-oyl3fly37eqw7dbbqsa9h4bsh9g13xu0vs5vu4bchs 1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                        <img  src="<?php echo base_url() ?>/web_assets/img/home-page/Jerry-Piping-bw-oyl3forlrwur6778abi56lm69f24r157w64c9y75z4 1.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--  -->

<!-- Testimonials -->
<section class="testimonials">
    <div class="mxrcwidth">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div>
                            <h2 class="second-color pb-3 op05">
                                Testimonial
                            </h2>
                            <h3 class="mainHeadings pt-1">What Industry Experts <br> Say About Us</h3>
                            <p class="f20">Get inspired By This Stories</p>
                        </div>

                        <div class="testiBox left">
                            <p class="f20"> <i class="fa fa-quote-left f20 second-color pr-2"></i> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime minus repellat tempore facilis molestiae laborum fugiat dolore!</p>
                            <span class="prime-color font-weight-bold f20">Hugh Glass</span> <br>
                            <small class="second-color">CEO , Revedent.</small>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-6 col-sm-12">
                        <div class="testiBox">
                            <p class="f20"> <i class="fa fa-quote-left f20 second-color pr-2"></i> Lorem ipsum dolor, sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia illo animi praesentium harum possimus. Maiores. consectetur adipisicing elit. Maxime minus repellat tempore facilis molestiae laborum fugiat dolore!</p>
                            <span class="prime-color font-weight-bold f20">Hugh Glass</span> <br>
                            <small class="second-color">CEO , Revedent.</small>
                        </div>
                        <div class="testiBox">
                            <p class="f20"> <i class="fa fa-quote-left f20 second-color pr-2"></i> Lorem ipsum dolor, sit amet Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi illum est beatae eos iusto deleniti. consectetur adipisicing elit. Maxime minus repellat tempore facilis molestiae laborum fugiat dolore!</p>
                            <span class="prime-color font-weight-bold f20">Hugh Glass</span> <br>
                            <small class="second-color">CEO , Revedent.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->

<!-- Latest -->
<section class="latest">
 <div class="mxrcwidth">
     <div class="row">
        <div class="pt-4 text-center">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="hmReportsTab" href="#hmReports" class="nav-link active" data-toggle="tab" role="tab">
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a id="hmBlogsTab" href="#hmBlogs" class="nav-link" data-toggle="tab" role="tab">
                        Blogs
                    </a>
                </li>
                <li class="nav-item">
                    <a id="hmPressTab" href="#hmPress" class="nav-link" data-toggle="tab" role="tab">
                        Press Release
                    </a>
                </li>
                <li class="nav-item">
                    <a id="hmCaseTab" href="#hmCase" class="nav-link" data-toggle="tab" role="tab">
                        Case Studies
                    </a>
                </li>
            </ul>


            <div id="content" class="tab-content hmTabContent" role="tablist">
                <div id="hmReports" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="hmReportsTab">
                    <div class="card-header" role="tab" id="hmReportsHead">
                        <h5 class="mb-0">
                            <!-- Note: `data-parent` removed from here -->
                            <a data-toggle="collapse" href="#hmReportsCollapse" aria-expanded="true" aria-controls="hmReportsCollapse">
                                Reports
                            </a>
                        </h5>
                    </div>

                    <!-- Note: New place of `data-parent` -->
                    <div id="hmReportsCollapse" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="hmReportsHead">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card hmSingleCard" style="">
                                        <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 38.png" alt="Card image cap">
                                        <div class="card-body">
                                          <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <!--  -->
                              <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card hmSingleCard" style="">
                                    <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 39.png" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                                  </div>
                              </div>
                          </div>
                          <!--  -->
                          <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card hmSingleCard" style="">
                                <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 40.png" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                              </div>
                          </div>
                      </div>
                      <!--  -->
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card hmSingleCard" style="">
                            <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 41.png" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                          </div>
                      </div>
                  </div>
                  <!--  -->
              </div>

          </div>
      </div>
  </div>

  <div id="hmBlogs" class="card tab-pane fade" role="tabpanel" aria-labelledby="hmBlogsTab">
    <div class="card-header" role="tab" id="hmBlogsHead">
        <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#hmBlogsCollapse" aria-expanded="false" aria-controls="hmBlogsCollapse">
                Blogs
            </a>
        </h5>
    </div>
    <div id="hmBlogsCollapse" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="hmBlogsHead">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card hmSingleCard" style="">
                        <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 38.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                      </div>
                  </div>
              </div>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card hmSingleCard" style="">
                    <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 39.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                  </div>
              </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card hmSingleCard" style="">
                <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 40.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
              </div>
          </div>
      </div>
      <!--  -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card hmSingleCard" style="">
            <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 41.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
          </div>
      </div>
  </div>
  <!--  -->
</div>
</div>
</div>
</div>

<div id="hmPress" class="card tab-pane fade" role="tabpanel" aria-labelledby="hmPressTab">
    <div class="card-header" role="tab" id="hmPressHead">
        <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#hmPressCollapse" aria-expanded="false" aria-controls="hmPressCollapse">
                Press Release
            </a>
        </h5>
    </div>
    <div id="hmPressCollapse" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="hmPressHead">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card hmSingleCard" style="">
                        <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 38.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                      </div>
                  </div>
              </div>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card hmSingleCard" style="">
                    <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 39.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                  </div>
              </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card hmSingleCard" style="">
                <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 40.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
              </div>
          </div>
      </div>
      <!--  -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card hmSingleCard" style="">
            <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 41.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
          </div>
      </div>
  </div>
  <!--  -->
</div>
</div>
</div>
</div>

<div id="hmCase" class="card tab-pane fade" role="tabpanel" aria-labelledby="hmCaseTab">
    <div class="card-header" role="tab" id="hmCaseHead">
        <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#hmCaseCollapse" aria-expanded="false" aria-controls="hmCaseCollapse">
                Case Studies
            </a>
        </h5>
    </div>
    <div id="hmCaseCollapse" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="hmCaseHead">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card hmSingleCard" style="">
                        <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 38.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                      </div>
                  </div>
              </div>
              <!--  -->
              <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card hmSingleCard" style="">
                    <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 39.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
                  </div>
              </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card hmSingleCard" style="">
                <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 40.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
              </div>
          </div>
      </div>
      <!--  -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card hmSingleCard" style="">
            <img class="card-img-top"  src="<?php echo base_url() ?>/web_assets/img/home-page/Rectangle 41.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Information Regarding COVID-19 Vaccine - MoHFW</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="second-color">Read More <i class="fa fa-arrow-right pl-2"></i></a>
          </div>
      </div>
  </div>
  <!--  -->
</div>
</div>
</div>
</div>
</div>
</div>
<div class="text-right w-100">
    <a href="<?=base_url().'reports'?>" class="pt-1 pb-5 pr-4" style="float: right;">View More Reports <i class="fa fa-arrow-right pl-2"></i></a>
</div>

</div>
</div>
</section>
<!--  -->




<?php $this->load->view('templates/web_footer') ?>
