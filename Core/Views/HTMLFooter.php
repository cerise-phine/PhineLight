<?php
echo "\r\n" . "\r\n";
echo "\t" . "\t" . '</div>' . "\r\n";
echo "\t" . "\t" . '<div id="DefaultAJAXWindow" class="DefaultAJAXWindowInactive">' . "\r\n";
echo "\t" . "\t" . "\t" . '<a href="#" data-close="DefaultAJAXWindow" class="AJAX DefaultAJAXCloser"></a>' . "\r\n";
echo "\t" . "\t" . "\t" . '<div data-close="DefaultAJAXWindow" class="AJAX DefaultAJAXCloserOverlay"></div>' . "\r\n";
echo "\t" . "\t" . "\t" . '<div id="DefaultAJAXWindowContainer"></div>' . "\r\n";
echo "\t" . "\t" . '</div>' . "\r\n";

if(count($Site->Resources->JS) > 0)
{
    foreach($Site->Resources->JS as $Resource => $Path)
    {
        echo "\t" . "\t" . '<script src="' . $Request->RootURL . $Path . ($Config->System->Debug === true ? $CacheBuster : '') . '"></script>' . "\r\n";
    }
}

echo "\t" . '</body>' . "\r\n";
echo '</html>';