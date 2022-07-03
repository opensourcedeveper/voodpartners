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
				"@id": "/privacy-policy",
				"name": "Privacy Policy"
			}
		}]
	}
</script>
<div class="container">
	<div class="row">
		<?php print_r($Record) ?>
	</div>
</div>
<?php $this->load->view('templates/web_footer') ?>