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
				"@id": "/disclaimer",
				"name": "Disclaimer"
			}
		}]
	}
</script>
<div class="container">
	<div class="row mt-30 mt-xs-0">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1 class="disctitle">Disclaimer</h1>
			<p>This site is provided by Tryangle  on an “as is” and “as available” basis. Tryangle  makes no representations or warranties of any kind express or implied, as to the operation of this site or the information, content, materials, or products included on this site. You expressly agree that your use of this site is at your sole risk.</p> 

			<p>To the full extent permissible by applicable law, Tryangle  disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose. </p>

			<p>Tryangle  does not warrant that this site, its servers, or e-mail sent from Tryangle  is free of viruses or other harmful components. Tryangle  will not be liable for any damages of any kind arising from the use of this site, but not limited to direct, indirect, incidental, corrective, and consequential damages.</p> 

			<p>This particular Disclaimer is subject to change and can be modified at any given point in terms to new policies or products made available.</p>
		</div>
	</div>
</div>
<?php $this->load->view('templates/web_footer') ?>