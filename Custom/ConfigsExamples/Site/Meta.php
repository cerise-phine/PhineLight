<?php
namespace Configs\Site;

trait Meta
{
    private $Title                              = '';
    private $Language                           = 'en';
    private $Meta                               = array
            (
                'description'                       => '',
                'keywords'                          => '',
                'copyright'                         => '',
                'language'                          => 'en',
                'city'                              => 'Vienna',
                'country'                           => 'Austria',
                'robots'                            => 'index,follow'
            );
}