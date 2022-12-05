<?php
namespace Configs;

trait Database
{
    private $Databases                          = array
            (
                'Main'                              => array
                (
                    'Host'                              => 'localhost',
                    'Port'                              => 3306,
                    'Name'                              => '',
                    'User'                              => '',
                    'Password'                          => '',
                    'PDSN'                              => 'mysql',
                    'Charset'                           => 'UTF8'
                ),
                'Tracking'                          => array
                (
                    'Host'                              => 'localhost',
                    'Port'                              => 3306,
                    'Name'                              => '',
                    'User'                              => '',
                    'Password'                          => '',
                    'PDSN'                              => 'mysql',
                    'Charset'                           => 'UTF8'
                )
            );
}