<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
	<style type="text/css">
		#one 
		{
			background-color: #FFF;
			color: #000;
		}
		#two
		{
			background-color: #000;
			color: #FFF;
		}
	</style>
	<div class="content-wrapper">
		<section class="content">
			<!-- Default card -->
			<div class="card">
				<div class="card-header with-border">
					<h3 class="card-title"><?php echo $pagetitle ?></h3>
					<div class="text-right">
						<a href="<?php echo(base_url().'downloads/'.$for.'.xlsx'); ?>" class="btn btn-primary" download>Download Sample File</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="card-body">
					<?php if($this->session->flashdata('msg')): ?>
						<div class="alert alert-info">
							<strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
						</div>
					<?php endif ?>
					<br />
					<form id="upload_form" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<p class="col-md-12 text-center"><strong> You can Download the Sample excel file and upload it back by filling your data in it </strong></p>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="excelFile">
								Upload Excel File
							</label>
							<input type="hidden" name="test" value="test">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
								<input type="file" id="excelFile" name="excelFile" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
								<a href="<?php echo base_url().'list/'.$for ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
								<button type="submit" name="importfile" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>This is a small modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function()
		{
			var base = "<?php echo base_url();?>";
			var page ="<?=$for?>"
			$("#upload_form" ).submit(function(e) 
			{
				var form = $(this);
				e.preventDefault();
				// alert('Worked');
				$.ajax
				({ 
					url: base+"upload/"+for,
					data: form.serialize(), // <--- THIS IS THE CHANGE
    				type: 'post',
    				dataType: "html",
					success: function(result)
					{
						
					}
				});
			});
		});
	</script>
<?php $this->load->view('templates/footer') ?>