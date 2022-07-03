<?php $this->load->view('templates/web_header') ?>
<div class="container">
	<?php if ($Records): ?>
		<div class="row">
			<h3><strong>Result for :</strong> <?=$searchFor ?></h3>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3><strong>List of Reports</strong></h3>
				<?php foreach ($Records as $Record): ?>
					<blockquote class="reportlist-box">
						<div class="row">
							<div class="col-sm-2 col-xs-2 text-center">
								<img src="<?=base_url() ?>web_assets/image/report-img.jpg" class="w-100  img-responsive" alt="<?=str_replace(' ', '-', $Record['meta_keyword'])?>">
							</div>

							<div class="col-sm-10 col-xs-10">
								<a style="color: #3C4858 !important" href="<?=base_url()?>report/<?=strtolower($Record['slug'])?>"><strong><?=$Record['title'] ?></strong></a>
								<div class="hidden-xs yrs mt-10 mb-10">
									<span class="date-span"><?=date('F Y', strtotime($Record['published_date'])) ?></span>
									<span class="category-span"><?=$this->data_model->get(array('id'=> $Record['cat_id']), NULL, array('name'), NULL, 'category')[0]['name'] ?></span>
								</div>
								<p class="paradesc">
									<?=substr($Record['report_desc'], 0, 300).' ...' ?><a href="<?=base_url()?>report/<?=strtolower($Record['slug'])?>" class="label label-info">read more</a>
								</p>   
							</div>
						</div>
					</blockquote>
				<?php endforeach ?>
				<?php else: ?>
				 <section>
            <div class="mwidth pt-5 pb-5">
                <div class="row"> 
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h2 class="fortitle">Oops! That Report can’t be found</h2>
							<p>
								Let us know what you are looking for. Please fill the form below and we will get back to you shortly.
							</p>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 bgclr">
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

						<?php endif ?>
						<!-- <?php $this->load->view('templates/pagination') ?> -->
					</div>
				</div>
				</div>

			</div>
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