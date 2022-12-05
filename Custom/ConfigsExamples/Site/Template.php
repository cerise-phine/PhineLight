<?php
namespace Configs\Site;

trait Template
{
    private $Template                           = array
            (    
                'viewport'                         => 'width=device-width, initial-scale=1.0, minimum-scale=1.0',
                'format-detection'                 => 'telephone=yes',
                'HandheldFriendly'                 => 'true',
                'apple-mobile-web-app-capable'     => 'yes',
                'theme-color'                      => '#000000',
                'apple-mobile-web-app-status-bar-style' => 'black'
            );
}