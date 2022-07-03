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
				"@id": "/about-us/",
				"name": "About Us"
			}
		}]
	}
</script>
<!-- Banner -->
<div class="serviceBannerList">
	<div class="mxrcwidth">
		<div class="row">
			<div class="bannerText text-center">
				<!-- <img src="./img/home-page/Frame-3.png" alt=""> -->
				<h1 class="heading pt-3 f30">Lorem ipsum dolor sit consectetur adipisicing.</h1>
				<!-- <p class="pt-4">Get Inpired by These Feedback!</p> -->
			</div>
		</div>
	</div>

</div>
<!--  -->


<!-- Report Details -->
<hr>
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



	<!--  -->
	

	<!-- End content -->


	<?php $this->load->view('templates/web_footer') ?>

