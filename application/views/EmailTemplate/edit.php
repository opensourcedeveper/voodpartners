<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
	<div class="content-wrapper">
		<section class="content">
			<!-- Default card -->
			<div class="card">
				<div class="card-header with-border">
					<h3 class="card-title"><?php echo $pagetitle ?></h3>
				</div>
				<div class="card-body">
					<?php if($this->session->flashdata('msg')): ?>
						<div class="alert alert-info">
							<?php echo $this->session->flashdata('msg') ?>
						</div>
					<?php endif ?>
					<br />
					<!-- <?php print_r($Record) ?> -->
					<form class="form-horizontal form-label-left" action="<?= base_url('email-template/update/'.$Record['id']) ?>" id="demo-form2" data-parsley-validate method="post" enctype="multipart/form-data">
						<?php foreach ($fields as $key => $value): ?>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="<?=$key?>">									
										<?=ucfirst($key)?>									
								</label>
								<div class="col-md-7 col-sm-7 col-xs-12">
									
									<?php if($value == "textarea"): ?>
										<textarea rows="10" cols="80" id="Page_content" name="<?=$key?>" class="form-control col-md-7 col-xs-12"><?=$Record[$key]?></textarea>
									<?php else: ?>
										<?php if ($key == "email"): ?>
											<span id="<?=$key?>-valid" class="hidden mob">
												<i class="fa fa-check pwd-valid"></i>Valid Email ID
											</span>
											<span id="<?=$key?>-invalid" class="hidden mob-helpers">
												<i class="fa fa-times email-invalid"></i>Invalid Email ID
											</span>
										<?php endif ?>
										<?php if ($key =='img'): ?>
											<img src="<?php echo(base_url().'uploads/'.$for.'/'.$Record[$key]) ?>" alt="Change image" title="Change image" id="uploadimg" class="img-thumbnail" style="max-width: 200px;">
											<input style="display:none;" id="file" name="img" type="file" class="file" data-show-preview="false">
										<?php else: ?>
										<!-- <span >Please enter valid <?=$key?></span> -->
                                                                                        <input type="<?= $value ?>" id="<?= ucfirst($key) ?>" name="<?= $key ?>" <?php if ($key != 'pages' && $key != 'multi_price' && $key != 'ent_price' && $key != 'published_status' && $key != 'meta_title' && $key != 'meta_desc') echo 'required="required"' ?> class="form-control col-md-7 col-xs-12" value="<?= $Record[$key] ?>">
										<?php endif ?>
									<?php endif ?>
								</div>
							</div>
						<?php endforeach ?>
						
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								
									<a href="<?php echo base_url().'email-templates' ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
								
								<button class="btn btn-primary" type="reset">Reset</button>
								<button type="submit" id="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		$("#uploadimg" ).click(function()
		{
		    $( "#file" ).click();
		});
	</script>
<?php $this->load->view('templates/footer') ?>
