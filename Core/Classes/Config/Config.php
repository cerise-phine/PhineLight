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

namespace Config;

class Config
{
    # 1 variables
    private $Database                           = null;
    private $Mail                               = null;
    private $Resources                          = null;
    private $Robots                             = null;
    private $Site                               = null;
    private $Sites                              = null;
    private $System                             = null;
    private $User                               = null;
    
    # 2 magic methods
    public function __construct()#: void
    {
        $this->Database                         = new \Config\Database;
        $this->Mail                             = new \Config\Mail;
        $this->Resources                        = new \Config\Resources\Resources;
        $this->Robots                           = new \Config\Robots;
        $this->Site                             = new \Config\Site\Site;
        $this->Sites                            = new \Config\Sites\Sites;
        $this->System                           = new \Config\System;
        $this->User                             = new \Config\User;
    }
    
    public function __get($Var): ?object
    {
        switch($Var)
        {
            case 'Database':
                return $this->Database;
                
            case 'Mail':
                return $this->Mail;
                
            case 'Resources':
                return $this->Resources;
                
            case 'Robots':
                return $this->Robots;
                
            case 'Site':
                return $this->Site;
                
            case 'Sites':
                return $this->Sites;
                
            case 'System':
                return $this->System;
                
            case 'User':
                return $this->User;
                
            default:
                return null;
        }
    }
}