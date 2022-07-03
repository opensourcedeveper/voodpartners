<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidemenu');?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Press Releases Management
			<small>Add Press Release</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>admin/pressrelease/list">Press Releases</a></li>
			<li class="active">Add Press Release</li>
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
								<label>Press Release Image</label>
								<input type='file'  name="image" onchange="readURL(this);" required>	
								<img id="blah" src="http://placehold.it/180" alt="your image" class="pre-img" width="180" height="150" style="margin-top: 10px;" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Title *</label>
								<input type="text" name="title" class="form-control" placeholder="Enter Press Release Title...." required>
							</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label>Category</label>
								<select name="category" class="form-control select2" data-placeholder="Select a Category" style="width: 100%;">
									<option>News</option>
									<option>Science</option>
									<option>Healthcare</option>
									<option>Technology</option>
								</select>
							</div>
						</div> -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Description *</label>
								<textarea id="editor1" name='description'>
								</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Meta Title *</label>
								<input type="text" name="metatitle" class="form-control" placeholder="Enter Press Release Meta Title...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Meta Description *</label>
								<input type="text" name="metadesc" class="form-control" placeholder="Enter Press Release Meta Description...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Meta Keyword *</label>
								<input type="text" name="metakeyword" class="form-control" placeholder="Enter Press Release Meta Keywords...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Canonical/URL *</label>
								<input type="text" name="slug" class="form-control" placeholder="Enter Press Release URL...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Press Release Schema</label>
								<input type="text" name="schema" class="form-control" placeholder="Enter Press Release Schema...." required>
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