<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Clients Management
			<small>Add Client</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>admin/client/list">Clients</a></li>
			<li class="active">Add Client</li>
		</ol>
	</section>
	<section class="content">
		<div class="card card-default">
			<div class="card-header with-border">
				<h3 class="card-title"><?=$pagetitle;?></h3>
			</div>
			<div class="card-body">
				<?php if($this->session->flashdata('msg')): ?>
					<div class="alert alert-info">
						<strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
					</div>
				<?php endif ?>
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						<div class="col-md-12">
							<div class="form-group">
								<label>Client Image</label>
								<input type='file' class="form-control" name="image" onchange="readURL(this);" required>	
								<img id="blah" src="http://placehold.it/100" alt="your image" class="pre-img" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Client Name *</label>
								<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control select2" data-placeholder="" style="width: 100%;">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<?php $this->load->view('templates/footer');?>