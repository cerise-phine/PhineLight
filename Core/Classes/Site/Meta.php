<?php
################################################################################
#
#   Phine Light
#
#   Version:        0.3
#   Date:           2022-11-30
#
#   Author:         Katharina Philipp Klinz
#   Company:        private
#   Contact:        mail@cerise.rocks
#   Web:            https://www.cerise.rocks/
#   License:        MIT
#   Description:    Lightweight MVC / CMS
#   
#   Copyright (c) 2022 Katharina Philipp Klinz
#   Permission is hereby granted, free of charge, to any person obtaining a copy
#   of this software and associated documentation files (the “Software”), to 
#   deal in the Software without restriction, including without limitation the 
#   rights to use, copy, modify, merge, publish, distribute, sublicense, and/or 
#   sell copies of the Software, and to permit persons to whom the Software is 
#   furnished to do so, subject to the following conditions:
#
#   The above copyright notice and this permission notice shall be included in 
#   all copies or substantial portions of the Software.
#
#   THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
#   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
#   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
#   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
#   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
#   FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
#   IN THE SOFTWARE. 
#
################################################################################

namespace Site;

class Meta
{
    # 1 variables
    private $Title                              = null;
    private $Language                           = null;
    private $Meta                               = null;
    private $Social                             = null;
    private $Template                           = null;
    
    # 2 magic methods
    public function __construct($Config, $Site)#: void
    {
        $this->initMeta($Config, $Site);
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'Title':
                return $this->Title;
                
            case 'Language':
                return $this->Language;
                
            case 'Meta':
                return $this->Meta;
                
            case 'Template':
                return $this->Template;
                
            case 'Social':
                return $this->Social;
                
            default:
                return null;
        }
    }
    
    public function __set($Var, $Value)#: void
    {
        switch($Var)
        {
            case 'Title':
                return $this->setTitle($Value);
                
            case 'Language':
                return $this->setLanguage($Value);
                
            case 'Meta':
                return $this->setMeta($Value);
                
            case 'Template':
                return $this->Template($Value);
                
            case 'Social':
                return $this->Social($Value);
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Title'                             => $this->Title,
            'Language'                          => $this->Language,
            'Meta'                              => $this->Meta,
            'Social'                            => $this->Social,
            'Template'                          => $this->Template
        );
    }
    
    # public method
    public function setTitle($Title): void
    {
        if(is_string($Title))
        {
            $this->Title                        = $Title;
        }
    }
    
    public function setLanguage($Language): void
    {
        if(is_string($Language))
        {
            $this->Language                     = $Language;
        }
    }
    
    public function setMeta($Meta): void
    {
        if(is_array($Meta))
        {
            foreach($Meta as $MetaKey => $MetaValue)
            {
                $this->Meta[$MetaKey]           = $MetaValue;
            }
        }
    }
    
    public function setSocial($Social): void
    {
        if(is_array($Social))
        {
            foreach($Social as $SocialKey => $SocialValue)
            {
                $this->Social[$SocialKey]       = $SocialValue;
            }
        }
    }
    
    public function setTemplate($Template): void
    {
        if(is_array($Template))
        {
            foreach($Template as $TemplateKey => $TemplateValue)
            {
                $this->Template[$TemplateKey]   = $TemplateValue;
            }
        }
    }
    
    # private methods
    private function initMeta($Config, $Site): void
    {
        if(isset($Site['Title']))
        {
            $this->Title                        = $Site['Title'];
        }
        else
        {
            $this->Title                        = $Config->Site->Meta->Title;
        }
        
        if(isset($Site['Language']))
        {
            $this->Language                     = $Site['Language'];
        }
        else
        {
            $this->Language                     = $Config->Site->Meta->Language;
        }
        
        $this->Meta                             = $Config->Site->Meta->all;
        
        if(isset($Site['Meta']) && is_array($Site['Meta']) && count($Site['Meta']) > 0)
        {
            $this->setMeta($Site['Meta']);
        }
        
        $this->Template                         = $Config->Site->Template->all;
        
        if(isset($Site['Template']) && is_array($Site['Template']) && count($Site['Template']) > 0)
        {
            $this->setTemplate($Site['Template']);
        }
        
        $this->Social                           = $Config->Site->Social->all;
        
        if(isset($Site['Social']) && is_array($Site['Social']) && count($Site['Social']) > 0)
        {
            $this->setSocial($Site['Social']);
        }
    }
}