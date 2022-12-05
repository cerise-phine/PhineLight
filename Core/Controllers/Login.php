<?php
$Tracking                                       = false;

if(filter_input(INPUT_GET,'LGNRQST') == 1)
{
    if($User->Auth)
    {
        $Modal->Title                           = 'Juhu';
        $Modal->Text                            = 'Du bist eingeloggt.';
        $Modal->Link                            = $Request->RootURL;
        $Modal->LinkText                        = 'Zurück zur Startseite';
        $Site->View                             = MODAL;
    }
    else
    {
        $Modal->Title                           = 'Login failed';
        $Modal->Text                            = 'Sorry, your given login or password was not found.';
        $Site->View                             = MODAL;
    }
}
else
{
    $Site->View                                 = LOGIN;
}