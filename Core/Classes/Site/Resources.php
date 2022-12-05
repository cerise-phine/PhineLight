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

class Resources
{
    # 1 variables
    private $CSS                                = array();
    private $JS                                 = array();
    private $Fonts                              = array();
    private $Favicon                            = null;
    
    # 2 magic methods
    public function __construct($Resources, $Site)#: void
    {
        $this->CSS                              = $Resources->CSS->all;
        $this->JS                               = $Resources->JS->all;
        $this->Fonts                            = $Resources->Fonts->all;
        $this->Favicon                          = $Resources->Favicon;
        
        if(isset($Site['CSS']) && is_array($Site['CSS']) && count($Site['CSS']) > 0)
        {
            foreach($Site['CSS'] as $CSSKey => $CSSFile)
            {
                $this->CSS[$CSSKey]             = $CSSFile;
            }
        }
        
        if(isset($Site['JS']) && is_array($Site['JS'])&& count($Site['JS']) > 0)
        {
            foreach($Site['JS'] as $JSKey => $JSFile)
            {
                $this->JS[$JSKey]               = $JSFile;
            }
        }
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'CSS':
                return $this->CSS;
                
            case 'JS':
                return $this->JS;
                
            case 'Fonts':
                return $this->Fonts;
                
            case 'Favicon':
                return $this->Favicon;
                
            default:
                return null;
        }
    }
    
    public function __set($Var, $Value)#: mixed
    {
        switch($Var)
        {
            case 'CSS':
                return $this->setCSS($Value);
                
            case 'JS':
                return $this->setJS($Value);
                
            case 'Font':
                return $this->setFont($Value);
                
            case 'Favicon':
                return $this->setFavicon($Value);
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'CSS'                               => $this->CSS,
            'JS'                                => $this->JS,
            'Fonts'                             => $this->Fonts,
            'Favicon'                           => $this->Favicon
        );
    }
    
    # public methods
    public function setCSS($CSS): void
    {
        if(is_file($CSS))
        {
            $this->CSS[]                        = $CSS;
        }
    }
    
    public function setJS($JS): void
    {
        if(is_file($JS))
        {
            $this->JS[]                         = $JS;
        }
    }
    
    public function setFont($Font): void
    {
        if(is_array($Font) && isset($Font['File']) && is_file($Font['File']))
        {
            $this->Fonts[]                      = $Font;
        }
    }
    
    public function setFavicon($Favicon): void
    {
        if(is_file($Favicon))
        {
            $this->Favicon                      = $Favicon;
        }
    }
}