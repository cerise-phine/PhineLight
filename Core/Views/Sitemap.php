<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\r\n";

if(isset($Sitemap) && is_array($Sitemap))
{
    foreach($Sitemap AS $SitemapPath => $SitemapPathDetails)
    {
        echo "\t" . '<url>' . "\r\n";
        echo "\t\t" . '<loc>' . $SitemapPath . '</loc>' . "\r\n";

        if(isset($SitemapPathDetails['SitemapLastmod']))
        {
            echo "\t\t" . '<lastmod>' . $SitemapPathDetails['SitemapLastmod'] . '</lastmod>' . "\r\n";
        }

        if(isset($SitemapPathDetails['AltLang']) && isset($SitemapPathDetails['AltLang']['hreflang']) && isset($SitemapPathDetails['AltLang']['href']))
        {
            echo "\t\t" . '<xhtml:link rel="alternate" hreflang="' . $SitemapPathDetails['AltLang']['hreflang'] . '" href="' . $SitemapPathDetails['AltLang']['href'] . '" />' . "\r\n";
        }

        echo "\t" . '</url>' . "\r\n";
    }
}

echo '</urlset>';