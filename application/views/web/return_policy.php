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
				"@id": "/return-policy",
				"name": "Return Policy"
			}
		}]
	}
</script>
<div class="container">
	<div class="row mt-30 mt-xs-0">
		<div class="col-md-12 col-sm-12 col-xs-12 howpara">
			<h1 class="htotitle"><?=$page ?></h1>
			<p class="pt-20">Considering the nature of the reports, refunds after receiving the copy of the report cannot be granted. However, any modifications or customizations are at publisher’s discretion.</p>
		</div>
	</div>
</div>
<?php $this->load->view('templates/web_footer') ?>