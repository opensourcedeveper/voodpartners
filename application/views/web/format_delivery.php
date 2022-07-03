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
				"@id": "/format-delivery",
				"name": "Format and Delivery"
			}
		}]
	}
</script>
<div class="container">
	<div class="row mt-30 mt-xs-0">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1 class="fadtitle">Format and Delivery</h1>
			<p>Delivery in the form of a PDF/PPT/Word Doc to your email address.</p>
			<p>In case of Hard copies, delivery charges will be charged depending on the location of the client.</p>
			<p>Tryangle  does not guarantee that the goods when received are in perfect condition and is not liable for any damage during transit of goods. It is at publisher discretion, if the replacement can be made with no extra cost.</p>
		</div>
	</div>
</div>
<?php $this->load->view('templates/web_footer') ?>