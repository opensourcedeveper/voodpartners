<?php $this->load->view('templates/web_header') ?>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement":
        [
        {
            "@type": "ListItem",
            "position": 1,
            "item":
            {
                "type":"Website",
                "@id": "/",
                "name": "Home"
            }
        },
        {
            "@type": "ListItem",
            "position": 2,
            "item":
            {
                "type":"WebPage",
                "@id": "/report/<?= strtolower($Record['slug']) ?>",
                "name": "<?= $Record['title'] ?>"
            }
        }]
    }
</script>

<?php
$a = mt_rand(0, 9);
$b = mt_rand(0, 9);
$c = $a + $b;
?>
    <!-- Banner -->
    <div class="internalrdBanner">
        <div class="mxrcwidth">
            <div class="row">
                <div class="bannerText text-center">
                    <!-- <img src="<?php echo base_url() ?>/web_assets/img/home-page/Frame-3.png" alt=""> -->
                    <h1 class="heading pt-3 f30">Lorem ipsum dolor sit consectetur adipisicing.</h1>
                    <!-- <p class="pt-4">Get Inpired by These Feedback!</p> -->
                </div>
            </div>
        </div>

    </div>
    <!--  -->





            <!-- Report Details -->
  <!--  -->
    <section>



            <hr class="pt-3">

                <div class="mxrcwidth">
                    <div class="rdiscHead">
                        <h1> <?= $Record['title'] ?></h1>
                        <p>Category : <a  class="prime-color"  href="<?= base_url() . 'categories/' . $this->data_model->get(array('id' => $Record['cat_id']), NULL, array('slug'), NULL, 'category')[0]['slug'] ?>"><?= $this->data_model->get(array('id' => $Record['cat_id']), NULL, array('name'), NULL, 'category')[0]['name'] ?> </a></p>
                        <p><!-- eport ID : <span class="font-weight-bold prime-color">MD0485</span>  -->  Pages :<span class="font-weight-bold prime-color"> <?= ($Record['pages'] > 0) ? $Record['pages'] : 'N/A'; ?></span> | Published Date : <span class="font-weight-bold prime-color"><?= date('d M Y', strtotime($Record['published_date'])) ?></span></p>
                      
                    </div>
    
                </div>
        


        <div class="mxrcwidth pt-3 pb-3">
<!--             <div class="rpDetailsAnchors pt-5 pb-2">
                <a href="#">Report&nbsp;Description</a>
                <a href="#">Introduction</a>
                <a href="#">Research&nbsp;Methodology</a>
                 <a href="#">Market&nbsp;Overview</a> 
            </div>
            <div class="rpDetailsAnchors pt-4">
                <a href="#">Component&nbsp;Overview</a>
                <a href="#">Deployment&nbsp;Overview</a>
                <a href="#">Organization&nbsp;Overview</a>
                <a href="#">Vertical&nbsp;Overview</a>
            </div>
 -->








             <!--  -->
            <div class="description pt-3 pb-3">






                  <div class="reportDesc">
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item rpDetailsAnchors">
                                    <a id="tab-A" href="#reportDescription" class="nav-link active" data-toggle="tab" role="tab">Report Description</a>
                                </li>
                                <li class="nav-item  rpDetailsAnchors">
                                    <a id="tab-B" href="#tableofContent" class="nav-link" data-toggle="tab" role="tab">Table of Content</a>
                                </li>
                                <li class="nav-item  rpDetailsAnchors">
                                    <a id="tab-C" href="#tableandFigures" class="nav-link" data-toggle="tab" role="tab">Tables and Figures</a>
                                </li>
                                <li class="nav-item  rpDetailsAnchors">
                                    <a id="" href="<?= base_url() ?>request-sample/<?= $Record['slug'] ?>" class="nav-link rdredsam">Request Sample <i class="fa fa-envelope pl-2"></i></a>
                                </li>
                            </ul>
                        
                        
                            <div id="content" class="tab-content" role="tablist">
                                <div id="reportDescription" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                                    <div class="card-header" role="tab" id="heading-A">
                                        <h5 class="mb-0">
                                            <!-- Note: `data-parent` removed from here -->
                                            <a data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                                Report Description
                                            </a>
                                        </h5>
                                    </div>

                                    
                           <!-- Note: New place of `data-parent` -->
                                    <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                                        <div class="card-body">
                                            <p>Description</p>
                                           <pre style="background-color: transparent; border: none; font-size: 15px; font-family: 'Open Sans', sans-serif;;white-space: normal; "><?= $Record['report_desc'] ?>   </pre>
                                     
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="tableofContent" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                                    <div class="card-header" role="tab" id="heading-B">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                                Table of Content
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-B" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                                        <div class="card-body">
                                            <p class="pt-3">Table of Content</p>
                                  <pre style="background-color: transparent; border: none; font-size: 15px;font-family: 'Open Sans', sans-serif;; white-space: pre-wrap; "></pre><?= $Record['toc'] ?></pre>
                                     
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="tableandFigures" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                                    <div class="card-header" role="tab" id="heading-C">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C"> 
                                                <h2 class="pt-3">
                                                Tables and Figures</h2>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-C" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-C">
                                        <div class="card-body">
                                            <p class="pt-3">  Tables and Figures</p>
                                           <pre style="background-color: transparent; border: none; font-size: 15px;font-family: 'Open Sans', sans-serif;; white-space: pre-wrap; "></pre>  <?= $Record['list_tbl_fig'] ?></pre>
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <h2 class="pt-3">Regional Overview</h2>
               <img src="<?php echo base_url() ?>/web_assets/img/home-page/World_map.png" alt="" class="w-100">

                        <div class="mt-5 text-center">
                            <h4>Didn't find relative ?</h4>
                            <a href="#" class="prime-color">Make it Custom right now!</a>
                        </div>


            
            </div>
        </div>
    </section>



    <!--  -->
    <section class="related pt-5">
        <div class="mxrcwidth pt-3 pb-3">
            <h3>RELATED SEARCH</h3>
            <hr class="mt-0 pt-0" style="background-color: #0045AD;">
            <div class="row pt-4">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <img class="card-img-top" src="<?php echo base_url() ?>/web_assets/img/cancer/Rectangle 98.png" alt="Card image cap">
                        <div class="card-body pl-0 pr-0 pb-3">
                            <h4><a href="#" class="prime-color">Lorem ipsum dolor sit.</a> </h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <img class="card-img-top" src="<?php echo base_url() ?>/web_assets/img/cancer/Rectangle 100.png" alt="Card image cap">
                        <div class="card-body pl-0 pr-0 pb-3">
                            <h4><a href="#" class="prime-color">Lorem ipsum dolor sit.</a> </h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <img class="card-img-top" src="<?php echo base_url() ?>/web_assets/img/cancer/Rectangle 99.png" alt="Card image cap">
                        <div class="card-body pl-0 pr-0 pb-3">
                            <h4><a href="#" class="prime-color">Lorem ipsum dolor sit.</a> </h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <img class="card-img-top" src="<?php echo base_url() ?>/web_assets/img/cancer/Rectangle 101.png" alt="Card image cap">
                        <div class="card-body pl-0 pr-0 pb-3">
                            <h4><a href="#" class="prime-color">Lorem ipsum dolor sit.</a> </h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <!--  -->
            </div>
        </div>
    </section>
    <!--  -->

     <!-- Clients -->
     <section class="clients" style="background-color: #F1F1F1;">
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
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/Jerry-Piping-bw-oyl3forlrwur6778abi56lm69f24r157w64c9y75z4 1.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/Jrango-Glasses-bw-oyl3fi6qg2lqwxgscqnr759y3pyk95f3j9jxx0gx6o 1.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/Korane-Scents-bw-oyl3fj4kmwn18jff792drn1ep3txguitve7feafj0g 1.png" alt="">
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/LeeveOn-Branding-bw-oyl3fl090kplvrcow9vmwmkbvvknw8qajniecucqo0 1.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/Nadine-Ghaida-bw-oyl3fly37eqw7dbbqsa9h4bsh9g13xu0vs5vu4bchs 1.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 clientsLogo">
                            <img src="<?php echo base_url() ?>/web_assets/img/home-page/Jerry-Piping-bw-oyl3forlrwur6778abi56lm69f24r157w64c9y75z4 1.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
     </section>
     <!--  -->

                   
             
  
 <?php $this->load->view('templates/web_footer') ?>