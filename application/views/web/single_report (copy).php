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
    <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="/" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="/reports" class="prime-color">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $Record['title'] ?></li>
            </ol>
        </nav>
        </div>
        <!--  -->






            <!-- Report Details -->

        <section>
            <div class="mwidth">
                <div class="">
                    <div class="rdiscHead">
                        <h1> <?= $Record['title'] ?></h1>
                        <p>Category : <a  class="prime-color"  href="<?= base_url() . 'categories/' . $this->data_model->get(array('id' => $Record['cat_id']), NULL, array('slug'), NULL, 'category')[0]['slug'] ?>"><?= $this->data_model->get(array('id' => $Record['cat_id']), NULL, array('name'), NULL, 'category')[0]['name'] ?> </a></p>
                        <p><!-- eport ID : <span class="font-weight-bold prime-color">MD0485</span>  -->  Pages :<span class="font-weight-bold prime-color"> <?= ($Record['pages'] > 0) ? $Record['pages'] : 'N/A'; ?></span> | Published Date : <span class="font-weight-bold prime-color"><?= date('d M Y', strtotime($Record['published_date'])) ?></span></p>
                        <p> <a id="" href="#" class="rdredsamMob">Request Sample <i class="fa fa-envelope pl-2"></i></a></p>
                    </div>
    
                </div>
        
                   
             
                <div class="row">
                    <div class="col-md-9">
                        <div class="reportDesc">
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a id="tab-A" href="#reportDescription" class="nav-link active" data-toggle="tab" role="tab">Report Description</a>
                                </li>
                                <li class="nav-item">
                                    <a id="tab-B" href="#tableofContent" class="nav-link" data-toggle="tab" role="tab">Table of Content</a>
                                </li>
                                <li class="nav-item">
                                    <a id="tab-C" href="#tableandFigures" class="nav-link" data-toggle="tab" role="tab">Tables and Figures</a>
                                </li>
                                <li class="nav-item">
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
                                           <pre style="background-color: transparent; border: none; font-size: 15px; font-family: 'Open Sans', sans-serif;;white-space: pre-wrap; "><?= $Record['report_desc'] ?>   </pre>
                                     
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
                                            <p>Table of Content</p>
                                   <pre style="background-color: transparent; border: none; font-size: 15px;font-family: 'Open Sans', sans-serif;; white-space: pre-wrap; "><?= $Record['toc'] ?></pre>
                                     
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="tableandFigures" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                                    <div class="card-header" role="tab" id="heading-C">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                                                Tables and Figures
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-C" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-C">
                                        <div class="card-body">
                                            <p>  Tables and Figures</p>
                                             <pre style="background-color: transparent; border: none; font-size: 15px;font-family: 'Open Sans', sans-serif;;white-space: pre-wrap; ">   <?= $Record['list_tbl_fig'] ?></pre>
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <h4>Didn't find relative ?</h4>
                            <a href="#" class="prime-color">Make it Custom right now!</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <div class="rdPriceBox">
                                <h3>Select Price</h3>
                                <hr>
                                <form action="<?= base_url() . 'buyNow/' . $Record['id'] ?>" method="get">
                                    <div class="form-check">
                                     <select class="form-control" name="price">
                                                <?php if ($Record['single_price'] != NULL): ?>
                                                    <option value="single_price">Single User - $ <?= $Record['single_price'] ?></option>
                                                <?php endif ?>
                                                <?php if ($Record['multi_price'] != NULL): ?>
                                                    <option value="multi_price">Multi User - $<?= $Record['multi_price'] ?></option>
                                                <?php endif ?>

                                                <?php if ($Record['ent_price'] != NULL): ?>
                                                    <option value="ent_price">Enterprise User - $<?= $Record['ent_price'] ?></option>
                                                <?php endif ?>
                                            </select>
                                 <!--    <div class="form-check">
                                        <label class="form-check-label" for="radio3">
                                          <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                                          <span>Enterprise </span> <span>$ 3300</span>
                                        </label>
                                      </div> -->
                                      <div class="text-center pt-3">
                                        <button type="submit" class="btn clrfff">Buy Now <i class="fa fa-shopping-cart"></i> </button>
                                      </div>
                                 
                                  </form>
                            </div>
                            <!--  -->
                            
                            <div class="rdsrightFormsBox mt-4">
                                <a href="<?= base_url() ?>request-sample/<?= $Record['slug'] ?>" class="bg-prime">Enquiry <i class="fa fa-phone pl-2"></i></a>
                                <a href="<?= base_url() ?>check-discount/<?= $Record['slug'] ?>" class="bg-prime">Discount <i class="fa fa-percent pl-2"></i> </a>
                            </div>
                            <!--  -->
                            <div class="rdincludes mt-4">
                                <h3>Report Includes</h3>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-check"></i> Full Description
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> All Figures
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> All Tables
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> 24*7 Assistance
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> PDF and Word Format
                                    </li>

                                </ul>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  -->

<section class="fix-req" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/web_assets/img/logo.svg" class="fix-img"></a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-10 col-xs-10">
                <h4><?= substr(strip_tags($Record['title']), 0, 200) ?>. . . . .</h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right mt-20">
                <a href="<?= base_url() ?>request-sample/<?= $Record['slug'] ?>" class="btn-request"  aria-expanded="false" autofocus>
                    <span class="blink-me">Request Sample
                        <i class="fa fa-download" aria-hidden="true" style="margin-left:5px; color: #000;"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
 <?php $this->load->view('templates/web_footer') ?>