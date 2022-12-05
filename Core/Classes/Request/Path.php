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

namespace Request;

class Path
{
    # 1 variables
    private $Elements                           = array();
    
    # 2 magic methods
    public function __construct($Elements)#: void
    {
        if(is_array($Elements) && count($Elements) > 0)
        {
            $this->Elements                     = $Elements;
        }
        elseif(is_string($Elements) && !empty($Elements))
        {
            $this->Elements[0]                  = $Elements;
        }
    }
    
    public function __get($Var): ?string
    {
        switch($Var)
        {
            case 'Elements':
                return $this->Elements;
                
            default:
                return null;
        }
    }
    
    # 3 public methods
    public function getElement($Var): ?string
    {
        if(is_numeric($Var) && isset($this->Elements[$Var]))
        {
            return $this->Elements[$Var];
        }
        else
        {
            return null;
        }
    }
}