<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Clients Management
			<small>Edit Client</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>admin/client/list">Clients</a></li>
			<li class="active">Edit Client</li>
		</ol>
	</section>
	<section class="content">
		<div class="card card-default">
			<div class="card-header with-border">
				<h3 class="card-title"><?=$pagetitle;?></h3>
			</div>
			<div class="card-body">
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Image</label>
								<input type='file' class="form-control" name="image" onchange="readURL(this);" value="<?=$Record['img']?>" >
								<?php if (isset($Record['img'])): ?>
									<img id="blah" src="<?= base_url('uploads/clients')?>/<?=$Record['img']?>" alt="your image" class="pre-img" />
									<?php else: ?>
										<img id="blah" src="http://placehold.it/180" alt="your image" class="pre-img" />
									<?php endif ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Client Name *</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?=$Record['name']?>" required>
								</div>
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