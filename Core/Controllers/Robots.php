<?php
header("Content-Type: text/plain");
$RequestType                                    = REQUEST_TYPE_AJAX;
$View                                           = DIR_CORE_VIEWS . 'Robots.php';
$RobotsContent                                  = '';

foreach($Robots['UserAgents'] AS $UserAgent => $Rules)
{
    $RobotsContent                              .= 'User-Agent: ' . $UserAgent . "\r\n";
    foreach($Rules as $Path => $Allow)
    {
        $RobotsContent                          .= ($Allow === true ? 'Allow' : 'Disallow') . ': ' . $Path . "\r\n";
    }
    $RobotsContent                              .= "\r\n";
}
$RobotsContent                                  .= 'Sitemap: ' . $RootURL . 'sitemap.xml';