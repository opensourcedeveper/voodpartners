<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>' ?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
    <channel>
        <title>Tryangle </title>
        <link>http://strabayassociates.com/feed</link>
        <description>Tryangle  is a leading market research organization providing global market research and industry analysis reports. </description>

        <lastBuildDate> <?php echo date(DATE_RFC822); ?> </lastBuildDate>
        <language>en-US</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>        
        <image>
        <url>http://strabayassociates.com/web_assets/images/logo.png</url>
        <title>Tryangle </title>
        <link>http://strabayassociates.com/</link>
        <width>32</width>
        <height>32</height>
        </image> 
        <?php foreach ($press->result() as $post): ?>
            <item>
                <title><?php echo xml_convert($post->title); ?></title>
                <link><?php echo base_url('press_release/' . $post->id . '/' . str_replace(' ', '-', $post->meta_keyword)) ?></link>
                <guid><?php echo base_url('press_release/' . $post->id . '/' . str_replace(' ', '-', $post->meta_keyword)) ?></guid>
                <pubDate><?php
                    $date = new DateTime($post->created_at);
                    echo $date->format(DateTime::RFC822);
                    ?></pubDate>
                <dc:creator><![CDATA[sales@strabayassociates.com]]></dc:creator>
                <category><![CDATA[Press Release]]></category>
                <description><![CDATA[ <?php echo character_limiter($post->desc, 200); ?> ]]></description>
                <content:encoded><![CDATA[<?php echo $post->desc; ?>]]></content:encoded>
            </item>
        <?php endforeach; ?> 

    </channel>
</rss>