<?php
################################################################################
#
#   Phine Light
#
#   Version:        0.3
#   Date:           2022-11-30
#
#   Author:         Katharina Philipp Klinz
#   Company:        private
#   Contact:        mail@cerise.rocks
#   Web:            https://www.cerise.rocks/
#   License:        MIT
#   Description:    Lightweight MVC / CMS
#   
#   Copyright (c) 2022 Katharina Philipp Klinz
#   Permission is hereby granted, free of charge, to any person obtaining a copy
#   of this software and associated documentation files (the “Software”), to 
#   deal in the Software without restriction, including without limitation the 
#   rights to use, copy, modify, merge, publish, distribute, sublicense, and/or 
#   sell copies of the Software, and to permit persons to whom the Software is 
#   furnished to do so, subject to the following conditions:
#
#   The above copyright notice and this permission notice shall be included in 
#   all copies or substantial portions of the Software.
#
#   THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
#   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
#   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
#   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
#   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
#   FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
#   IN THE SOFTWARE. 
#
################################################################################

# 1 Constants
define('DIR_ROOT',                              __DIR__ . DIRECTORY_SEPARATOR);
define('DIR_CORE',                              DIR_ROOT . 'Core' . DIRECTORY_SEPARATOR);
define('DIR_CORE_CLASSES',                      DIR_CORE . 'Classes' . DIRECTORY_SEPARATOR);
define('DIR_CORE_CONTROLLERS',                  DIR_CORE . 'Controllers' . DIRECTORY_SEPARATOR);
define('DIR_CORE_VIEWS',                        DIR_CORE . 'Views' . DIRECTORY_SEPARATOR);

define('DIR_CUSTOM',                            DIR_ROOT . 'Custom' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_CLASSES',                    DIR_CUSTOM . 'Classes' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_CONFIGS',                    DIR_CUSTOM . 'Configs' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_CONTROLLERS',                DIR_CUSTOM . 'Controllers' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_VIEWS',                      DIR_CUSTOM . 'Views' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_SQL',                        DIR_CUSTOM . 'SQL' . DIRECTORY_SEPARATOR);
define('DIR_CUSTOM_VENDOR',                     DIR_CUSTOM . 'Vendor' . DIRECTORY_SEPARATOR);

define('DIR_PUBLIC',                            DIR_ROOT . 'public' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_TEMPLATE',                   DIR_PUBLIC . 'Template' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_CONTENT',                    DIR_PUBLIC . 'Content' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_CONTENT_HTML',               DIR_PUBLIC_CONTENT . 'HTML' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_CONTENT_MEDIA',              DIR_PUBLIC_CONTENT . 'Media' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_CONTENT_MEDIA_LIBRARY',      DIR_PUBLIC_CONTENT_MEDIA . 'Library' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES',                        DIR_PUBLIC . 'Res' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_CSS',                    DIR_PUBLIC_RES . 'CSS' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_CSS_CORE',               DIR_PUBLIC_RES_CSS . 'Core' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_CSS_CUSTOM',             DIR_PUBLIC_RES_CSS . 'Custom' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_CSS_VENDOR',             DIR_PUBLIC_RES_CSS . 'Vendor' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_JS',                     DIR_PUBLIC_RES . 'JS' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_JS_CORE',                DIR_PUBLIC_RES_JS . 'Core' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_JS_CUSTOM',              DIR_PUBLIC_RES_JS . 'Custom' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_JS_VENDOR',              DIR_PUBLIC_RES_JS . 'Vendor' . DIRECTORY_SEPARATOR);
define('DIR_PUBLIC_RES_FONTS',                  DIR_PUBLIC_RES . 'Fonts' . DIRECTORY_SEPARATOR);

define('DIR_WEB',                               '');
define('DIR_WEB_TEMPLATE',                      DIR_WEB . 'Template/');
define('DIR_WEB_CONTENT',                       DIR_WEB . 'Content/');
define('DIR_WEB_CONTENT_HTML',                  DIR_WEB_CONTENT . 'HTML/');
define('DIR_WEB_CONTENT_MEDIA',                 DIR_WEB_CONTENT . 'Media/');
define('DIR_WEB_CONTENT_MEDIA_LIBRARY',         DIR_WEB_CONTENT_MEDIA . 'Library/');
define('DIR_WEB_RES',                           DIR_WEB . 'Res/');
define('DIR_WEB_RES_CSS',                       DIR_WEB_RES . 'CSS/');
define('DIR_WEB_RES_CSS_CORE',                  DIR_WEB_RES_CSS . 'Core/');
define('DIR_WEB_RES_CSS_CUSTOM',                DIR_WEB_RES_CSS . 'Custom/');
define('DIR_WEB_RES_CSS_VENDOR',                DIR_WEB_RES_CSS . 'Vendor/');
define('DIR_WEB_RES_JS',                        DIR_WEB_RES . 'JS/');
define('DIR_WEB_RES_JS_CORE',                   DIR_WEB_RES_JS . 'Core/');
define('DIR_WEB_RES_JS_CUSTOM',                 DIR_WEB_RES_JS . 'Custom/');
define('DIR_WEB_RES_JS_VENDOR',                 DIR_WEB_RES_JS . 'Vendor/');
define('DIR_WEB_RES_FONTS',                     DIR_WEB_RES . 'Fonts/');

define('ROLE_ANONYMOUS',                        'ANONYMOUS');
define('ROLE_USER',                             'USER');
define('ROLE_ADMIN',                            'ADMIN');

define('REQUEST_TYPE_HTML',                     'html');
define('REQUEST_TYPE_AJAX',                     'ajax');
define('REQUEST_TYPE_API',                      'api');

define('MODAL',                                 DIR_CORE_VIEWS . 'Modal.php');
define('LOGIN',                                 DIR_CORE_VIEWS . 'Login.php');
define('ROBOTS',                                DIR_CORE_VIEWS . 'Robots.php');
define('SITEMAP',                               DIR_CORE_VIEWS . 'Sitemap.php');
define('HTML_HEADER',                           DIR_CORE_VIEWS . 'HTMLHeader.php');
define('HTML_FOOTER',                           DIR_CORE_VIEWS . 'HTMLFooter.php');

# 2 Start session
session_start();

# 3 Autoloader
spl_autoload_register(function($ClassName){
    $Directories                                = array
    (
        'Core'                                      => DIR_CORE_CLASSES,
        'Custom'                                    => DIR_CUSTOM
    );
    
    $ClassRelativePath                          = str_replace("\\", DIRECTORY_SEPARATOR, $ClassName) . '.php';

    foreach($Directories as $Directory)
    {
        $ClassAbsolutePath                      = $Directory . $ClassRelativePath;
        if(is_file($ClassAbsolutePath))
        {
            require($ClassAbsolutePath);
            return;
        }
    }
});

# 4 Core classes
$Config                                         = new Config\Config;
$Request                                        = new Request\Request;
$Modal                                          = new Modal\Modal;
$User                                           = new User\User($Config->User);
$Site                                           = new Site\Site($Config, $Request, $User, $Modal);
$DB                                             = new Helpers\Database\LPDOH;

# 5 Core variables
$CacheBuster                                    = '?bust=' . microtime();
$DarkMode                                       = (isset($_SESSION['DarkMode']) && $_SESSION['DarkMode'] === true ? true : false);

# 6 Require controller
if(!is_null($Site->Controller))
{
    require($Site->Controller);
}

# 7 Output
# 7.1 Require header
if($Request->Type !== REQUEST_TYPE_AJAX)
{
    require_once(HTML_HEADER);
    require_once(DIR_PUBLIC_TEMPLATE . 'Header.php');
}

# 7.2 Require view
if(!is_null($Site->View))
{
    require($Site->View);
}

# 7.3 Require footer
if($Request->Type !== REQUEST_TYPE_AJAX)
{
    require_once(DIR_PUBLIC_TEMPLATE . 'Footer.php');
    require_once(HTML_FOOTER);
}

# 8 Site tracking
#   Helpers\Helpers::Tracking($DBTracking);