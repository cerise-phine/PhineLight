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

class Site
{
    # 1 variables
    private $Config                             = null;
    private $Request                            = null;
    private $User                               = null;
    private $Modal                              = null;
    
    private $Site                               = null;
    private $Resources                          = null;
    private $Meta                               = null;
    private $Sitemap                            = null;
    
    private $Role                               = null;
    private $Controller                         = null;
    private $View                               = null;
    
    # 2 magic methods
    public function __construct($Config, $Request, $User, $Modal)#: void
    {
        $this->Config                           = $Config;
        $this->Request                          = $Request;
        $this->User                             = $User;
        $this->Modal                            = $Modal;
        
        $this->initSite();
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'Role':
                return $this->Role;
                
            case 'Controller':
                return $this->Controller;
                
            case 'View':
                return $this->View;
                
            case 'Resources':
                return $this->Resources;
                
            case 'Meta':
                return $this->Meta;
                
            case 'Sitemap':
                return $this->Sitemap;
                
            default:
                return null;
        }
    }
    
    public function __set($Var, $Value)#: void
    {
        switch($Var)
        {
            case 'View':
                return $this->setView($Value);
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Role'                                  => $this->Role,
            'Resources'                             => $this->Resources,
            'Meta'                                  => $this->Meta,
            'Sitemap'                               => $this->Sitemap,
            'Controller'                            => $this->Controller,
            'View'                                  => $this->View
        );
    }
    
    public function setView($View): void
    {
        if(is_file($View))
        {
            $this->View                         = $View;
        }
        else
        {
            $this->Modal->Title                 = 'Error';
            $this->Modal->Text                  = 'View file does not exist.';
            $this->View                         = MODAL;
        }
    }
    
    # private methods
    private function initSite(): void
    {
        if(isset($this->Config->Sites->all[$this->Request->Site]))
        {
            $this->Site                         = $this->Config->Sites->all[$this->Request->Site];
            
            if(isset($this->Site['Role']))
            {
                $this->Role                     = $this->Config->Sites->all[$this->Request->Site]['Role'];
            }
            else
            {
                $this->Role                     = ROLE_ANONYMOUS;
            }
            
            if(
                isset($this->Site['Role'])
                && (
                    ($this->Site['Role'] === ROLE_ADMIN && $this->User->Role !== ROLE_ADMIN)
                    || ($this->Site['Role'] === ROLE_USER && $this->User->Role !== ROLE_USER)
                )
            )
            {
                $this->Modal->Title             = 'Not allowed';
                $this->Modal->Text              = 'Sorry, you are not allowed to see this page.';
                $this->View                     = MODAL;
            }
            else
            {
                $this->Controller               = (isset($this->Site['Controller']) ? $this->Site['Controller'] : null);
                $this->View                     = (isset($this->Site['View']) ? $this->Site['View'] : null);
            }
            
            $this->Resources                        = new Resources($this->Config->Resources, $this->Site);
            $this->Meta                             = new Meta($this->Config, $this->Site);
            $this->Sitemap                          = new Sitemap($this->Config->Sites->all[$this->Request->Site]);
        }
        else
        {
            $this->Modal->Title                 = '404 - File not found';
            $this->Modal->Text                  = 'Sorry, the requested source could not be found on the server.';
            $this->Modal->Code                  = 404;
            $this->View                         = MODAL;
        }
    }
}