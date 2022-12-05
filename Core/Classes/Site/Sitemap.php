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

class Sitemap
{
    # 1 variables
    private $Use                                = true;
    private $Lastmod                            = null;
    private $Controller                         = null;
    
    # 2 magic methods
    public function __construct($Site)#: void
    {
        if(isset($Site['Sitemap']))
        {
            $this->setUse($Site['Sitemap']);
        }
        
        if(isset($Site['SitemapLastmod']))
        {
            $this->setLastmod($Site['SitemapLastmod']);
        }
        
        if(isset($Site['SitemapController']))
        {
            $this->setController($Site['SitemapController']);
        }
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'Use':
                return $this->Use;
                
            case 'Lastmod':
                return $this->Lastmod;
                
            case 'Controller':
                return $this->Controller;
                
            default:
                return null;
        }
    }
    
    public function __set($Var, $Value)#: void
    {
        switch($Var)
        {
            case 'Use':
                return $this->setUse($Value);
                
            case 'Lastmod':
                return $this->setLastmod($Value);
                
            case 'Controller':
                return $this->setController($Value);
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Use'                               => $this->Use,
            'Lastmod'                           => $this->Lastmod,
            'Controller'                        => $this->Controller
        );
    }
    
    # public method
    public function setUse($Use): void
    {
        if(is_bool($Use))
        {
            $this->Use                          = $Use;
        }
    }
    
    public function setLastmod($Lastmod): void
    {
        if(is_string($Lastmod))
        {
            $this->Lastmod                      = $Lastmod;
        }
    }
    
    public function setController($Controller): void
    {
        if(is_file($Controller))
        {
            $this->Controller                   = $Controller;
        }
    }
}