<?php if ($Record): ?>
	<?php foreach ($Record as $letestReport): ?>					
		
		<?=base_url()?>press_release/<?=$letestReport['id'].'/'.str_replace(' ', '-', $letestReport['meta_keyword'])?><br>
		
	<?php endforeach ?>
	<?php endif ?>