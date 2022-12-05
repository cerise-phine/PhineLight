<?php
namespace Configs\Site;

trait Social
{
    private $Social                             = array
            (
                'og:type'                          => false,
                'og:url'                           => '##ROOTURL##',
                'og:title'                         => false,
                'og:description'                   => false,
                'og:image'                         => false,
                'og:image:width'                   => 500,
                'og:image:height'                  => 500,
                'twitter:site'                     => '##ROOTURL##',
                'twitter:title'                    => false,
                'twitter:description'              => false,
                'twitter:image'                    => false,
                'twitter:image:alt'                => false,
                'twitter:card'                     => false
            );
}