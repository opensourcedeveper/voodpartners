<?php $this->load->view('templates/web_header'); ?>
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
                "@id": "/press-releases",
                "name": "Press Release"
            }
        },
        {
            "@type": "ListItem",
            "position": 3,
            "item":
            {
                "type":"WebPage",
                "@id": "/press-release/<?=strtolower($Record['slug']); ?>",
                "name": "<?php print_r($Record['title']); ?>"
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
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>press-releases" class="prime-color">Press Release</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, ullam.</li> -->
            </ol>
        </nav>
        </div>
        <!--  -->
        <!-- Blog Listing -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 mb-20 mb-xs-10">
            <div class="mt-10">
                 
                <h1 style="font-size: 24px;"><b><?= $Record['title'] ?></b></h1>
                <h6><strong>Published At : </strong><?= date('M d Y', strtotime($Record['created_at'])) ?></h6>
                <img src="<?= base_url() ?>uploads/pressrelease/<?= $Record['image'] ?>" class="w-100 p-3" alt="<?php print_r($Record['title']); ?>">
            </div>

            <div class="content-desc mt-20">
                <?php print_r($Record['description']); ?>
            </div>
        </div>
  
    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>