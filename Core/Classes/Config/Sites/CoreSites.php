<?php
namespace Config\Sites;

trait CoreSites
{
    private $CoreSites                          = array
            (
                'index'                             => array(
                    'Controller'                        => DIR_CUSTOM_CONTROLLERS . 'Start.php'
                ),
                'Login'                             => array(
                    'Controller'                        => DIR_CORE_CONTROLLERS . 'Login.php'
                ),
                'Logout'                            => array(
                    'Controller'                        => DIR_CORE_CONTROLLERS . 'Logout.php'
                ),
                'robots'                            => array(
                    'Controller'                        => DIR_CORE_CONTROLLERS . 'Robots.php'
                ),
                'sitemap'                           => array(
                    'Controller'                        => DIR_CORE_CONTROLLERS . 'Sitemap.php'
                ),
                'DarkMode'                          => array(
                    'Controller'                        => DIR_CORE_CONTROLLERS . 'DarkMode.php'
                )
            );
}