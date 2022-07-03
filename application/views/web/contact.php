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
				"@id": "/contact-us",
				"name": "Contact Us"
			}
		}]
	}
</script>
   <!-- Banner -->
<div class="ContactBannerList">
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
<hr>
        <section>
            <div class="mwidth pt-5 pb-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12 align-self-center text-center">
                        <div class="pb-5">
                            <p class="f20">2400 East Katella Avenue, Suite 800, Anaheim, California 92806. USA</p>
                            <hr>
                            <p class="f20"><i class="fa fa-envelope pr-2"></i> sales@voodpartners.com</p>
                            <p class="f20"><i class="fa fa-phone pr-2"></i> (+1) 631 623 7311 </p>
                       
                            <div class="d-flex">
                                <a href="" class="ml-2 op05"><i class="fa fa-facebook"></i></a>
                                <a href="" class="ml-2 op05"><i class="fa fa-twitter"></i></a>
                                  <a href="" class=" ml-2 op05"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="contactForm">
                            <h1 class="text-center">Contact Form</h1>
                            <div>


					<?php if ($this->session->flashdata('flashSuccess')): ?>
						<div class="alert alert-danger">
							<strong>Info!</strong> <?php echo $this->session->flashdata('flashSuccess') ?>
						</div>
					<?php endif ?>
					<form method="POST">
						<div class="row contact-form">
							<div class="form-group is-empty col-md-12">
								<input type="text" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>" class="form-control" required>
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('name'); ?>
							</div>
							<div class="form-group is-empty col-md-6">
								<input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo set_value('email'); ?>" required>
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('email'); ?>
							</div>
							<div class="form-group is-empty col-md-6">
								<input type="text" name="phone" placeholder="Phone No" class="form-control" value="<?php echo set_value('phone'); ?>" required>
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('phone'); ?>
							</div>
							<div class="form-group is-empty col-md-6">
								<input type="text" name="job_title" placeholder="Job Title" class="form-control" value="<?php echo set_value('job_title'); ?>" required>
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('job_title'); ?>
							</div>
							<div class="form-group is-empty col-md-6">
								<input type="text" name="company" placeholder="Company" class="form-control" value="<?php echo set_value('company'); ?>" required="">
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('company'); ?>
							</div>

							<div class="form-group is-empty col-md-12">
								<input type="text" name="sub" placeholder="Subject" class="form-control" value="<?php echo set_value('sub'); ?>" required="">
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('sub'); ?>
							</div>
							<div class="form-group is-empty col-md-12">
								<textarea class="form-control" name="msg" placeholder="Message" rows="5"><?php echo set_value('msg'); ?></textarea>
								<?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>');
								echo form_error('msg'); ?>
							</div>
							<div class="col-md-12 text-center">
								<input type="submit" id="submit" class="btn bg-prime clrfff" value="Submit" >
							</div>
						</div>
					</form>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  -->









<?php $this->load->view('templates/web_footer') ?>