<?php
echo '<!DOCTYPE html>' . "\r\n";
echo '<html language="' . $Site->Meta->Language . '">' . "\r\n";
echo "\t" . '<head>' . "\r\n";
echo "\t" . "\t" . '<meta charset="utf-8" />' . "\r\n";

if(is_string($Site->Meta->Title))
{
    echo "\t" . "\t" . '<title>' . $Site->Meta->Title . '</title>' . "\r\n";
}

if(is_array($Site->Meta->Meta))
{
    foreach($Site->Meta->Meta as $MetaTag => $MetaContent)
    {
        if($MetaContent !== false && !empty($MetaContent))
        {
            echo "\t" . "\t" . '<meta name="' . $MetaTag . '" content="' . $MetaContent . '" />' . "\r\n";
        }
    }
}

if(is_array($Site->Meta->Template))
{
    foreach($Site->Meta->Template as $MetaTag => $MetaContent)
    {
        if($MetaContent !== false && !empty($MetaContent))
        {
            echo "\t" . "\t" . '<meta name="' . $MetaTag . '" content="' . $MetaContent . '" />' . "\r\n";
        }
    }
}

if(is_array($Site->Meta->Social))
{
    foreach($Site->Meta->Social as $MetaTag => $MetaContent)
    {
        if($MetaContent !== false && !empty($MetaContent))
        {
            echo "\t" . "\t" . '<meta property="' . $MetaTag . '" content="' . str_replace('##ROOTURL##', $Request->RootURL, $MetaContent) . '" />' . "\r\n";
        }
    }
}

if(count($Site->Resources->Fonts) > 0)
{
    echo "\t" . "\t" . '<style>' . "\r\n";
    foreach($Site->Resources->Fonts as $FontKey => $Font)
    {
        echo "\t" . "\t" . "\t" . '@font-face{' . "\r\n"
            . (isset($Font['File']) && is_file(DIR_PUBLIC . $Font['File']) && isset($Font['MIME']) && $Font['MIME'] === 'woff2'
                ? "\t" . "\t" . "\t" . "\t" . 'src:url(\'' . $Request->RootURL . $Font['File'] . '\') format(\'' . $Font['MIME'] . '\');' . "\r\n"
                : '')
            . (isset($Font['Family']) && is_string($Font['Family'])
                ? "\t" . "\t" . "\t" . "\t" . 'font-family:\'' . $Font['Family'] . '\';' . "\r\n"
                : '')
            . (isset($Font['Style']) && is_string($Font['Style'])
                ? "\t" . "\t" . "\t" . "\t" . 'font-style:\'' . $Font['Style'] . '\';' . "\r\n"
                : '')
            . (isset($Font['Weight']) && is_string($Font['Weight'])
                ? "\t" . "\t" . "\t" . "\t" . 'font-weight:\'' . $Font['Weight'] . '\';' . "\r\n"
                : '')
            . (isset($Font['Display']) && is_string($Font['Display'])
                ? "\t" . "\t" . "\t" . "\t" . 'font-display:\'' . $Font['Display'] . '\';' . "\r\n"
                : '')
            . (isset($Font['UnicodeRange']) && is_string($Font['UnicodeRange'])
                ? "\t" . "\t" . "\t" . "\t" . 'font-unicode-range:\'' . $Font['UnicodeRange'] . '\';' . "\r\n"
                : '')
            . "\t" . "\t" . "\t" . '}' . "\r\n";
    }
    echo "\t" . "\t" . '</style>' . "\r\n";
}

if(count($Site->Resources->CSS) > 0)
{
    foreach($Site->Resources->CSS as $Resource => $Path)
    {
        echo "\t" . "\t" . '<link rel="stylesheet" href="' . $Request->RootURL . $Path . ($Config->System->Debug === true ? $CacheBuster : '') . '" />' . "\r\n";
    }
}

/*
if(isset($SiteHeader['Alternate']) && $SiteHeader['Alternate'] !== false)
{
    foreach($SiteHeader['Alternate'] as $LanguageCode => $AlternateURL)
    {
        echo "\t" . "\t" . '<link rel="alternate" hreflang="' . $LanguageCode . '" href="' . $AlternateURL . '" />' . "\r\n";
    }
}
 * 
 */

if(!is_null($Site->Resources->Favicon))
{
    echo "\t" . "\t" . '<link rel="icon" href="' . $Request->RootURL . $Site->Resources->Favicon . '" type="image/svg+xml" />' . "\r\n";
}

echo "\t" . '</head>' . "\r\n";
echo "\t" . '<body>' . "\r\n";
echo "\t" . "\t" . '<div id="ScrollWrapper" class="' . ($DarkMode == 1 ? 'DarkMode' : '') . '">' . "\r\n" . "\r\n";