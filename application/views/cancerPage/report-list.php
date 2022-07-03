<?php $this->load->view('templates/web_header') ?>
    <!-- Banner -->
    <div class="internalBannerimage">
        <div class="mxrcwidth">
            <div class="row">
                <div class="bannerText text-center">
                    <!-- <img src="./img/home-page/Frame-3.png" alt=""> -->
                    <h1 class="heading pt-3">Lorem ipsum dolor sit <br> consectetur adipisicing.</h1>
                    <p class="pt-4">Get Inpired by These Feedback!</p>
                </div>
            </div>
        </div>

    </div>
 
<?php if ($reports): ?>

 
 <!--  -->
    <section class="rpLiat">
        <div class="mxrcwidth">

        	<div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 pt-3">
                    <div class="rpListbtns pt-5 pb-5">
                        <ul>
                            <li><a href="#">Cancer</a></li>
                            <li><a href="#">Diabetes</a></li>
                        </ul>
                    </div>
			<div class="row" id="ajax-post-container">

				<?php
				$this->load->view('reports/ajax_post', $reports);
				?>
			</div>
			<div class="row">
				<div class="col-lg-12 text-left mt-50 mb-30">
					<h5 id="not-found" style="display: none;">Sorry  not found</h5>
					<button class="btn btn-info" id="load-more">Load More</button>
				</div>
			</div>
		</div></div></div>
	</section>

	<div class="loader" style="display:none">
		<img src="<?php print base_url('loader.gif')?>">
	</div>
<?php endif ?>

<?php $this->load->view('templates/web_footer') ?>


<script type="text/javascript">
	var page = 1;
	var total_pages = <?php print $count?>;
	var baseurl = "<?= base_url('reports/')?>";

	$("#load-more").click(function(){

		page++;
		if(page <= total_pages) {
			loadMore(page);
		}else{
			$('#load-more').css('display','none');
			$('#not-found').css('display','block');
		}
	});


	function loadMore(page){
		$.ajax(
		{
			url: baseurl+'?page=' + page,
			type: "GET",
			beforeSend: function()
			{
				$('.loader').show();
			}
		})
		.done(function(data)
		{	           
			$('.loader').hide();
			$("#ajax-post-container").append(data);
		});
	}
</script>


