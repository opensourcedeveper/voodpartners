<?php header('Content-type: text/xml'); ?>
<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Sitemap --> 
    <url>
        <loc><?php echo base_url()?></loc>
        <priority>1</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc><?php echo base_url()."about-us"?></loc>
        <priority>1</priority>
        <changefreq>monthly</changefreq>
    </url>
 
    <url>
        <loc><?php echo base_url()."categories"?></loc>
        <priority>1</priority>
        <changefreq>daily</changefreq>
    </url>
 

    <url>
        <loc><?php echo base_url()."press-releases"?></loc>
        <priority>1</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc><?php echo base_url()."blogs"?></loc>
        <priority>1</priority>
        <changefreq>daily</changefreq>
    </url>
</urlset>