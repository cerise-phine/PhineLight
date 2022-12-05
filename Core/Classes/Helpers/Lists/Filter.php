<?php
namespace Helpers;
class ListFilter
{
    private function SEOString($String)
    {
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", ".");
        return urlencode(str_replace($replacements, '', $String));
    }
    
    
    
    
    
    
    
}