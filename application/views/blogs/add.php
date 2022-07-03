<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidemenu');?>
	  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		<h1>
			Blogs Management
			<small>Add Blog</small>
		</h1>
		   </div>
          <div class="col-sm-6">
		 <ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="<?=base_url();?>admin"> Home</a></li>
			<li class="breadcrumb-item"><a href="<?=base_url()?>admin/blog/list">Blogs</a></li>
			<li  class="breadcrumb-item active" >Add Blog</li>
		</ol>
	</div></div>
</div>
	</section>
 
  <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><?=$pagetitle;?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>


		<div class="card card-default">
		 
			<div class="card-body">
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Image</label>
								<input type='file'  name="image" onchange="readURL(this);" required>	
								<img id="blah" src="http://placehold.it/180" alt="your image" class="pre-img" width="180" height="150" style="margin-top: 10px;" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Title *</label>
								<input type="text" name="title" class="form-control" placeholder="Enter Blog Title...." required>
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
								<textarea id="editor1" name='description'>
								</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Title *</label>
								<input type="text" name="metatitle" class="form-control" placeholder="Enter Blog Meta Title...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Description *</label>
								<input type="text" name="metadesc" class="form-control" placeholder="Enter Blog Meta Description...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Meta Keyword *</label>
								<input type="text" name="metakeyword" class="form-control" placeholder="Enter Blog Meta Keywords...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Canonical/URL *</label>
								<input type="text" name="slug" class="form-control" placeholder="Enter Blog URL...." required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Blog Schema</label>
								<input type="text" name="schema" class="form-control" placeholder="Enter Blog Schema...." required>
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