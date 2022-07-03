<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>  
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?></link>
        <description><?php echo $page_description; ?></description>
        <dc:language><?php echo $page_language; ?></dc:language>
        <dc:creator><?php echo $creator_email; ?></dc:creator>
        <dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>
        <admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />
        <!-- Blogs -->
        <?php foreach($blog->result() as $post): ?>
            <item>
                <title><?php echo xml_convert($post->title); ?></title>
                <link><?php echo base_url('blog/' . $post->id) ?></link>
                <guid><?php echo base_url('blog/' . $post->id) ?></guid>
                <description><![CDATA[ <?php echo character_limiter($post->desc, 200); ?> ]]></description>
                <pubDate><?php echo substr($post->created_at, 0, 10); ?></pubDate>
            </item>
 
        <?php endforeach; ?> 
        <!-- Press Release -->
        <?php foreach($press->result() as $post): ?>
            <item>
                <title><?php echo xml_convert($post->title); ?></title>
                <link><?php echo base_url('press_release/' . $post->id .'/'. str_replace(' ', '-', $post->meta_keyword)) ?></link>
                <guid><?php echo base_url('press_release/' . $post->id.'/'. str_replace(' ', '-', $post->meta_keyword)) ?></guid>
                <description><![CDATA[ <?php echo character_limiter($post->desc, 200); ?> ]]></description>
                <pubDate><?php echo substr($post->created_at, 0, 10); ?></pubDate>
            </item>

        <?php endforeach; ?> 
        <!-- Reports -->
         <?php foreach($report->result() as $post): ?>
            <item>
                <title><?php echo xml_convert($post->title); ?></title>
                <link><?php echo base_url('report/' . $post->id ) ?></link>
                <guid><?php echo base_url('report/' . $post->id) ?></guid>
                <description><![CDATA[ <?php echo character_limiter($post->report_desc, 200); ?> ]]></description>
                <pubDate><?php echo substr($post->created_at, 0, 10); ?></pubDate>
            </item>

        <?php endforeach; ?> 
    </channel>
</rss>