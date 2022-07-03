<?php if ($total != 0): ?>
	<div class="row mt-30 mb-30">
		<div class="col-md-5 col-sm-5 col-xs-12 pagidesc pt-20">
			Showing <?=$start?> to <?=$end ?> out of <?=$total ?>
		</div>
		<?php if ($pages != 1): ?>
			<?php 
			if ($page_name == 'Categories'){
				$dest = 'categories';
			}else{
				$dest = 'publisher';
			}
			?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<ul class="pagination pagination-info pull-right">
					<?php if ($current != 1): ?>
						<li class="nobg">
							<?php if ($dest=='categories'): ?>
								<a href="<?=base_url().$dest.'/'.strtolower($Record['slug']).'/'.($current-1)?>">
									<img src="<?=base_url()?>web_assets/images/pagiLeft.png">
								</a>
								<?php else: ?>
									<a href="<?=base_url().$dest.'/'.$Record['slug'].'/'.($current-1)?>">
										<img src="<?=base_url()?>web_assets/images/pagiLeft.png">
									</a>
								<?php endif ?>
							</li>
						<?php endif ?>
						
						<?php if ($current>5): ?>
							<li><a href="javascript:void(0);">...</a></li>
						<?php endif ?>
						<?php 
						if ($pages>3){
							if ($current<3){
								$start = 1;
								$end = $current +2;
							}
							elseif ($current == $pages && $pages >5){
								$start = $current - 4;
								$end = $current;
							}
							elseif ($current == $pages && $pages <5){
								$start = $current - 3;
								$end = $current;
							}
							elseif ($current >= $pages - 2){
								$start = $current - 2;
								$end = $pages;
							}else{
								$start = $current - 2;
								$end = $current + 2;
							}
						}else{
							$start=1;
							$end = $pages;
						}
						for ($i=$start; $i <= $end; $i++) { ?> 
							<li <?php if($i==$current) echo 'class="active"' ?>>
								<?php if ($dest=='categories'): ?>
									<a href="<?=base_url().$dest.'/'.$Record['slug'].'/'.$i?>">
										<?=$i?>	</a>
										<?php else: ?>
											<a href="<?=base_url().$dest.'/'.$Record['id'].'/'.$i?>">
												<?=$i?>	</a>
											<?php endif ?>
										</li>	
									<?php } ?>
									<?php if ($current < $pages-2): ?>
										<li><a href="javascript:void(0);">...</a></li>
									<?php endif ?>
									<?php if ($current <= ($pages - 3)): ?>
										<?php if ($dest=='categories'): ?>
											<li><a href="<?=base_url().$dest.'/'.$Record['slug'].'/'.$pages?>"><?=$pages?></a></li>
											<?php else: ?>
												<li><a href="<?=base_url().$dest.'/'.$Record['id'].'/'.$pages?>"><?=$pages?></a></li>
											<?php endif ?>						
										<?php endif ?>
										<?php if ($current != $pages): ?>
											<li class="nobg">
												<?php if ($dest=='categories'): ?>
													<a href="<?=base_url().$dest.'/'.strtolower($Record['slug']).'/'.($current+1)?>">
														<img src="<?=base_url()?>web_assets/images/pagiRight.png">
													</a>
													<?php else: ?>
														<a href="<?=base_url().$dest.'/'.$Record['id'].'/'.($current+1)?>">
															<img src="<?=base_url()?>web_assets/images/pagiRight.png">
														</a>
													<?php endif ?>
												</li>
											<?php endif ?>
										</ul>
									</div>
								<?php endif ?>
							</div>
							<?php endif ?>