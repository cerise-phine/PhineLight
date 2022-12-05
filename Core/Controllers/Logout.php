<?php
$_SESSION['User']                               = false;
$_SESSION['MailCredentials']                    = false;
$Tracking                                       = false;

$Modal                                          = array(
                                                    'Title'     => 'Auf Wiedersehen!',
                                                    'Text'      => 'Du bist ausgeloggt.',
                                                    'Link'      => $Request->RootURL,
                                                    'LinkText'  => 'Startseite'
                                                );
$Site->View                                     = MODAL;