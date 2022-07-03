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
				"@id": "/categories/<?=$Record['slug'] ?>",
				"name": "<?=$Record['name'] ?>"
			}
		}]
	}
</script>

       <!--  -->
        <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="#" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="prime-color">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$Record['name'] ?></li>
            </ol>
        </nav>
        </div>
        <!--  -->
        <!-- Blog Listing -->
      <hr>
<div class="container">
 
	<?php if (isset($Record)): ?>
		<div class="row">
			<?php if ($Records): ?>
				<h3><strong>List of Reports</strong></h3>
				<?php foreach ($Records as $Rec): ?>
						<div class="rlistMain mb-4">
                            <div class="rlistMainsingle mt-3">
					<div class="row">
						<div class="col-sm-2 col-xs-2 text-center wp-75">
							<img src="<?=base_url() ?>web_assets/image/report-img.jpg" class="w-100  img-responsive" alt="<?=str_replace(' ', '-', $Rec['meta_keyword']) ?>">
						</div>
						<div class="col-sm-10 col-xs-10">
							<p class="mb-10">
								<a href="<?=base_url().'reportsdetails/'.strtolower($Rec['slug']);?>">
									<strong><?=substr(strip_tags($Rec['title']),0,200)?>...</strong>
								</a>
							</p>
							<span class="date-span"><?=date('F Y', strtotime($Rec['published_date'])) ?></span>
							<p class="paradesc mt-10">
								<?=substr(strip_tags($Rec['report_desc']), 0, 300).' ...' ?><a href="<?=base_url().'reportsdetails/'.strtolower($Rec['slug']);?>" class="label label-info">read more</a>
							</p>   
						</div>
					 
				 	</div>
			</div></div>
				<?php endforeach ?>
				<?php else: ?>
					<h3 class="text-center">No Report Found</h3>
				<?php endif ?>
 
			</div>
		<?php endif ?>
	</div>
	<?php $this->load->view('templates/web_footer') ?>
	<script type="text/javascript">
		$(document).ready(function(){					
			$("input:radio").on('change',function(){
				var categories = getCheckCategories('catChk');
				var regions = getCheckCategories('regChk');
				var duration = getCheckCategories('durChk');
				var price = getCheckCategories('priceChk');
				$.ajax({
					type: 'POST',
					url: '<?=base_url()?>/filter',
					data: { 
						'categories' : categories,
						'regions' : regions,
						'duration' : duration,
						'price' : price
					},
					success: function(msg){
						$('#Records').html(msg);
					}
				});
			});

			function getCheckCategories(a){
				var reportList = $("."+a);
				var list = [];
				$.each(reportList,function(i,item){
					if(item.checked == true){
						list.push(item.id);
					}
				});
				return list;
			}
		});
	</script>
