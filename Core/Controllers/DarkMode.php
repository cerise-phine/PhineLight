<?php
if($DarkMode === false)
{
    $_SESSION['DarkMode']                       = true;
    $DarkMode                                   = true;
    die('Bright Mode');
}
elseif($DarkMode === true)
{
    $_SESSION['DarkMode']                       = false;
    $DarkMode                                   = false;
    die('Dark Mode');
}