<?php header('Content-type: text/xml'); ?>
<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc><?php echo base_url()."main_pages";?></loc>
    </sitemap>
    <!-- Category Sitemap -->
    <?php foreach($items as $item) { ?>
        <?php if ($item->id!=4): ?>
            <sitemap>
                <loc><?php echo base_url().'sitemaps'."/".$item->id.'/'.str_replace(' ', '_', $item->name).'.xml'?></loc>
            </sitemap>
        <?php endif ?>
        
     <?php } ?>
     <!-- End Category -->
    <sitemap>
        <loc><?php echo base_url()."sitemap_blog";?></loc>
    </sitemap>
    <sitemap>
        <loc><?php echo base_url()."sitemap_pressRelease";?></loc>
    </sitemap>
</sitemapindex>