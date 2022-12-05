<?php
$Sitemap                                        = array();
$Sitemap[$RootURL . 'index.html']               = true;

foreach($Sites as $Path => $PathDetails)
{
    if($PathDetails['Role'] === ROLE_ANONYMOUS && (!isset($PathDetails['Sitemap']) || $PathDetails['Sitemap'] !== false))
    {
        if(isset($PathDetails['SitemapController']))
        {
            $SitemapControllerSites             = include($PathDetails['SitemapController']);
            $Sitemap                            = array_merge($Sitemap, $SitemapControllerSites);
        }
        else
        {
            $SitemapPath                        = $RootURL . $Path . '.html';
            $Sitemap[$SitemapPath]              = true;
        }
    }
}

if($RequestType === 'xml')
{
    header("Content-Type: text/xml; charset=utf-8");
    $RequestType                                = REQUEST_TYPE_AJAX;
    $View                                       = DIR_CORE_VIEWS . 'Sitemap.php';
}
else
{
    $View                                       = DIR_VIEWS . 'Sitemap.php';
}