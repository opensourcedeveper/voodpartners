<?php header('Content-type: application/xml'); ?>
<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php for ($i = 0; $i <= $npage; $i++) : ?>
       <url>
            <loc>
                <?php echo base_url()."catgory-sitemap/".$id."/".$i.'/'.$category;?>
            </loc>
        </url>
    <?php endfor; ?>
</urlset>