<?php $this->load->view('templates/web_header') ?>
<div class="container">
	<div class="row mt-30">
		<div class="col-md-12 col-xs-12 mb-10">

			<h1 class="thanktitle mb-20">Thank You</h1>
			<p>Thank you for contacting <b>Tryangle </b>.<br/><br/>

			Your form has been submitted successfully. We will contact you shortly.<br/><br/>
				Warm Regards,<br/>
				Nikolai Egger | Corporate Sales Specialist<br/>
				E-mail: <a href="mailto:sales@strabayassociates.com">sales@strabayassociates.com</a> | Web: <a href="https://www.strabayassociates.com/">www.strabayassociates.com</a> <br/>
			</p>
			<div class="error"><strong><?=$this->session->flashdata('flashSuccess')?></strong></div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/web_footer') ?>
