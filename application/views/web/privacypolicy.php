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

 <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="/" class="prime-color">Home</a></li>
    <li class="breadcrumb-item"><a href="#" class="prime-color">About us</a></li>
         <!--            <li class="breadcrumb-item active" aria-current="page">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, ullam.</li> -->
            </ol>
        </nav>
        </div>
        <!--  -->

                <section>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 howpara">
			<h1 class="termtitle">PRIVACY POLICY</h1>
			
			<p>Privacy Policy
<h2>Copyright</h2>
Unless specifically stated in conjunction with particular Material, all Material is copyrighted by us. You have no rights in or to the Material and you may not use any Material other than as permitted under this Agreement.

Trademark
All trade names, trademarks, service marks and other product and service names and logos on Our Service or in the Material are the proprietary trademarks of their respective owners and are protected by applicable trademark and copyright laws.</p>

		</div>
	</div>
</div></section>
<?php $this->load->view('templates/web_footer') ?>