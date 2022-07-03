<?php if ($reports): ?>
	<div class="row">
		<?php foreach($reports as $post){ ?>

			     <div class="caSingleReportox">
                        <div class="img">
                           <img src="<?=base_url() ?>web_assets/image/report-img.jpg" class="w-100  img-responsive" alt="<?=str_replace(' ', '-', $post['meta_keyword']) ?>">
                        </div>
                        <div class="text">
                            <span>	 
								<strong>Category Name</strong> </span>
                            <a href="#" class="prime-color">
                                <h2 class="pt-3"><a href="<?=base_url().'reportsdetails/'.strtolower($post['slug']);?>"><?=substr(strip_tags($post['title']),0,200)?>...</a></h2>
                            </a>
                            <p class="pt-1"><?=substr(strip_tags($post['report_desc']), 0, 300).' ...' ?><a href="<?=base_url().'reportsdetails/'.strtolower($post['slug']);?>" class="label label-info">read more</a></p>
                            <small><?=date('F Y', strtotime($post['published_date'])) ?></small>
                        </div>
                    </div>


 

		<?php } ?>

		<?php endif ?>