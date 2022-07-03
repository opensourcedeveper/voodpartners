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
<div class="aboutBannerList">
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
<section>
	<div class="mxrcwidth pt-3 pb-3">

		<div class="container">
			<div class="row mt-30">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<h1 class="heading-center"><span class="heading-center-span">About Us</span></h1>
					<div class="mt-30 text-justify">
						<P>VOOD Partners is a business consulting and advisory solution provider operating with the intent of driving change. We are a team of multidisciplinary professionals operating in a niche segment of Diabetic and Cancer related practices. Our major focus is on monitoring emerging technologies, analyzing markets, mapping trends, strategizing growth triggering actions, and helping companies to implement these plans. By applying machine + mind approaches, we produce a data driven eco-system of actionable insights and go-to market strategies to create a stream of innovative growth opportunities for companies, government, healthcare policy market, and investors.</p>
							<p>
								We at VOOD (Value out of Data) Partners operate with the simple aim of adding value to people’s lives, therefore we serve companies, governments, investors, and policy makers that deal in Cancer and Diabetic care. Providing Value-out-of-Data (VOOD) is what we stand for. Our value creation and engagement model starts with serving companies operating in these disease care in order to bring the best fit solution for people and create impact.   
							</p>
							<p>
								We are specialists in the process of gathering data, analyzing it, and producing impact generating results. We understand the science behind the data and therefore our research efforts are driven by simplifying business complexities that leads to real growth. As a team we choose to be a catalyst as well as partner to businesses by guiding them in a future shaped by growth.
								
							</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 mt-30">
						<img src="<?php echo base_url().'web_assets/' ?>image/about-us.jpg" class="img-responsive" style="width: 680px;">
					</div>
				</div><!--row ends here-->  
			</div><!-- main content container ends here--> 
		</div>
	</section>

	<!--  -->
	

	<!-- End content -->


	<?php $this->load->view('templates/web_footer') ?>

