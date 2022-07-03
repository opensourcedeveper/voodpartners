<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidemenu');?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Blogs Management
			<small>Edit Blog</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>admin/blog/list">Blogs</a></li>
			<li class="active">Edit Blog</li>
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
								<label>Blog Image</label>
								<input type='file'  name="image" onchange="readURL(this);" value="<?=$Record['image']?>" >
								<?php if (isset($Record['image'])): ?>
									<img id="blah" src="<?= base_url('uploads/blogs')?>/<?=$Record['image']?>" alt="your image" class="pre-img" width="180" height="150" style="margin-top: 10px;" />
									<?php else: ?>
										<img id="blah" src="http://placehold.it/180" alt="your image" class="pre-img" width="180" height="150" style="margin-top: 10px;" />
									<?php endif ?>

								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Blog Title *</label>
									<input type="text" name="title" class="form-control" placeholder="Enter Blog Title...." value="<?=$Record['title']?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Category</label>
									<select name="category" class="form-control select2" data-placeholder="Select a Category" style="width: 100%;">
										<option>News</option>
										<option>Science</option>
										<option>Healthcare</option>
										<option>Technology</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Description *</label>
									<textarea id="editor1" name='description'><?=$Record['description']?>
								</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Title *</label>
								<input type="text" name="metatitle" class="form-control" placeholder="Enter Blog Meta Title...." value="<?=$Record['metatitle']?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Description *</label>
								<input type="text" name="metadesc" class="form-control" placeholder="Enter Blog Meta Description...." value="<?=$Record['metadesc']?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Keyword *</label>
								<input type="text" name="metakeyword" class="form-control" placeholder="Enter Blog Meta Keywords...." value="<?=$Record['metakeyword']?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Canonical/URL *</label>
								<input type="text" name="slug" class="form-control" placeholder="Enter Blog URL...." value="<?=$Record['slug']?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Schema</label>
								<input type="text" name="schema" class="form-control" placeholder="Enter Blog Schema...." value="<?=$Record['schema']?>">
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view('templates/footer');?>