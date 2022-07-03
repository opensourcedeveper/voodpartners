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
                "@id": "/blogs/",
                "name": "Blogs"
            }
        },
        {
            "@type": "ListItem",
            "position": 2,
            "item":
            {
                "type":"WebPage",
                "@id": "/blog/<?=$Record['id']; ?>/<?=strtolower($Record['slug']); ?>",
                "name": "<?=$Record['title']; ?>"
            }
        }]
    }
</script>

        <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="#" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>blogs" class="prime-color">Blogs</a></li> 
            </ol>
        </nav>
        </div>
        <!--  -->
        <!-- Blog Listing -->

          <hr>
        <section>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 mb-0 mb-xs-10">
            <div class="mt-10">
                <a href="<?php echo base_url(); ?>">Home</a> >> <a href="<?php echo base_url(); ?>blogs">Blogs</a> >> <?php print_r($Record['title']); ?>                                      
                <h1 class="font-24"><b><?= $Record['title'] ?></b></h1>
                <h6><strong>Published At : </strong><?= date('M d Y', strtotime($Record['created_at'])) ?></h6>
                <img src="<?= base_url() ?>uploads/blogs/<?= $Record['image'] ?>" class="w-100 p-3" alt="<?php print_r($Record['title']); ?>">
            </div>

            <div class="content-desc mt-20">
                <?php print_r($Record['description']); ?>
            </div>
        </div>
 
    </div>
</div></section>
<?php $this->load->view('templates/web_footer') ?>