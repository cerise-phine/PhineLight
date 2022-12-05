<?php
namespace Configs;

trait Mail
{
    private $MailProviders                      = array
            (
                'Main'                              => array
                (
                    'Host'                              => '',
                    'Auth'                              => true,
                    'User'                              => '',
                    'Password'                          => '',
                    'Secure'                            => 'tls',
                    'Port'                              => '587',
                    'SendersMail'                       => '',
                    'SendersName'                       => '',
                )
            );
}