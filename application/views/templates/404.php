<?php $this->load->view('templates/web_header') ?>

     <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="/" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>reports" class="prime-color">Reports</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, ullam.</li> -->
            </ol>
        </nav>
        </div>
        <!--  -->

        <section>
 
</section>
	<?php 
	$categories = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');
	?>
	<hr class="mt-0" style="border-bottom:2px solid #ECEFEF">
	<?php 
	$a = mt_rand(0,9);
	$b = mt_rand(0,9);
	$c =$a + $b;
	?>


       <!--  -->

        <section>
            <div class="mwidth pt-5 pb-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12 align-self-center text-center">
                        <div class="pb-5">
                            <p class="f20">2400 East Katella Avenue, Suite 800, Anaheim, California 92806. USA</p>
                            <hr>
                            <p class="f20"><i class="fa fa-envelope pr-2"></i> sales@strabayassociates.com</p>
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
<!-- <script type="text/javascript">
	$(document).ready(function() 
	{
		var res = <?=$c?>;
		var v = 0;
		var checked_status = 0;
		$("#security").keyup(function() {
			v = this.value;
		
			if (v == res)
			{
				$("#submit").removeAttr("disabled");
			}
			else
			{
				$("#submit").attr("disabled", "disabled");
			}
		});
	});
</script> -->

