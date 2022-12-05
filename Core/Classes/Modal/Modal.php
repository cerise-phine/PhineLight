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

namespace Modal;

class Modal
{
    # 1 variables
    private $Error                              = false;
    private $Code                               = 200;
    private $AvailableCodes                     = [200, 404];
    private $Cat                                = true;
    private $Title                              = 'Modal title missing';
    private $Text                               = 'Modal text missing';
    private $Back                               = null;
    private $Link                               = null;
    private $LinkText                           = null;
    private $LinkA                              = null;
    private $LinkAText                          = null;
    private $LinkB                              = null;
    private $LinkBText                          = null;
    
    # 2 magic methods
    public function __get($Var): ?string
    {
        switch($Var)
        {
            case 'HTML':
                return $this->generateModal();
        }
    }
    
    public function __set($Var, $Value)#: void
    {
        switch($Var)
        {
            case 'Error':
                return $this->setError($Value);
                
            case 'Code':
                return $this->setCode($Value);
                
            case 'Cat':
                return $this->setCat($Value);
                
            case 'Title':
                return $this->setTitle($Value);
                
            case 'Text':
                return $this->setText($Value);
                
            case 'Back':
                return $this->setBack($Value);
                
            case 'Link':
                return $this->setLink($Value);
                
            case 'LinkText':
                return $this->setLinkText($Value);
                
            case 'LinkA':
                return $this->setLinkA($Value);
                
            case 'LinkAText':
                return $this->setLinkAText($Value);
                
            case 'LinkB':
                return $this->setLinkB($Value);
                
            case 'LinkBText':
                return $this->setLinkBText($Value);
        }
    }
    
    # 3 public methods
    public function setError($Error = false): void
    {
        if(is_bool($Error))
        {
            $this->Error                        = $Error;
        }
    }
    
    public function setCode($Code): void
    {
        if(is_numeric($Code) && in_array($Code, $this->AvailableCodes))
        {
            $this->Code                         = $Code;
            http_response_code($this->Code);
        }
    }
    
    public function setCat($Cat = true): void
    {
        if(is_bool($Cat))
        {
            $this->Cat                          = $Cat;
        }
    }
    
    public function setTitle($Title): void
    {
        if(is_string($Title) && !empty($Title))
        {
            $this->Title                        = $Title;
        }
    }
    
    public function setText($Text): void
    {
        if(is_string($Text) && !empty($Text))
        {
            $this->Text                         = $Text;
        }
    }
    
    public function setBack($Back): void
    {
        if(is_string($Back) && !empty($Back))
        {
            $this->Back                         = $Back;
        }
    }
    
    public function setLink($Link): void
    {
        if(is_string($Link) && !empty($Link))
        {
            $this->Link                         = $Link;
        }
    }
    
    public function setLinkText($LinkText): void
    {
        if(is_string($LinkText) && !empty($LinkText))
        {
            $this->LinkText                     = $LinkText;
        }
    }
    
    public function setLinkA($LinkA): void
    {
        if(is_string($LinkA) && !empty($LinkA))
        {
            $this->LinkA                        = $LinkA;
        }
    }
    
    public function setLinkAText($LinkAText): void
    {
        if(is_string($LinkAText) && !empty($LinkAText))
        {
            $this->LinkAText                    = $LinkAText;
        }
    }
    
    public function setLinkB($LinkB): void
    {
        if(is_string($LinkB) && !empty($LinkB))
        {
            $this->LinkB                        = $LinkB;
        }
    }
    
    public function setLinkBText($LinkBText): void
    {
        if(is_string($LinkBText) && !empty($LinkBText))
        {
            $this->LinkBText                    = $LinkText;
        }
    }
    
    # 4 private methods
    private function generateModal(): string
    {
        $Modal                                  = '<div class="AJAXModal">';
        $Modal                                  .= '<h1>' . $this->Title . '</h1>';
        $Modal                                  .= '<div class="ContentWrapper Modal">';
        
        if(!is_null($this->Back))
        {
            $Modal                              .= '<div class="SubMenu">';
            $Modal                              .= '<ul class="left">';
            $Modal                              .= '<li><a href="' . $this->Back . '"><i class="im im-arrow-left"></i></a></li>';
            $Modal                              .= '</ul>';
            $Modal                              .= '</div>';
        }
        
        $Modal                                  .= '<p>' . $this->Text . '</p>';
        
        if(!is_null($this->Link))
        {
            $Modal                              .= '<p>';
            $Modal                              .= '<a href="' . $this->Link . '">';
            $Modal                              .= (!is_null($this->LinkText) ? $this->LinkText : $this->Link);
            $Modal                              .= '</a>';
            $Modal                              .= '</p>';
        }
        
        if(!empty($this->Cat))
        {
            $Modal                              .= '<p>';
            $Modal                              .= (is_null($this->Error) ? 'Here&apos;s a cat:<br />' : '');
            $Modal                              .= '<i title="meeeooow"><svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path class="ErrorCat" d="M11.492 5.861c0-.828-.671-1.5-1.5-1.5-.827 0-1.499.672-1.499 1.5s.672 1.5 1.499 1.5c.829 0 1.5-.672 1.5-1.5zm-2.537 3.941c-.077.17-.325.352-.574.352-.501 0-.482-.655-.482-1.105.452-.172.779-.597.779-.979 0-.49-.531-.709-1.184-.709-.653 0-1.183.219-1.183.709 0 .382.327.807.778.979 0 .447.016 1.103-.486 1.103-.223 0-.484-.161-.569-.35-.221-.489-.959-.154-.74.332.219.487.761.827 1.318.827.343 0 .652-.135.882-.382.229.247.538.382.881.382h.001c.555 0 1.097-.34 1.317-.827.22-.487-.52-.821-.738-.332zm-2.46-3.941c0-.828-.672-1.5-1.5-1.5-.827 0-1.499.672-1.499 1.5s.672 1.5 1.499 1.5c.828 0 1.5-.672 1.5-1.5zm16.502 12.291c0 4.944-3.591 5.834-5.007 5.842-.787.005-2.4.006-4.26.006-2.427-.02-2.156-3.012-.206-2.973h2.616l-.583-.796c-1.16-1.582-.791-3.569.897-4.835.529-.398-.07-1.195-.6-.801-1.881 1.412-2.465 3.546-1.579 5.432h-.742c-.928.015-1.732.41-2.185 1.171-.339.573-.65 1.744.139 2.801l-3.432-.003c1.37-1.689 1.019-4.989.934-5.642-.088-.665-1.077-.518-.991.131.223 1.69.275 5.405-1.993 5.509h-2.009c-2.084.008-1.944-3.024 0-2.999.561.007.259.008.999 0 1.009-3.56-1.719-5.422-1.274-8.788-1.907-.986-2.724-2.792-2.724-4.862 0-2.504 1.193-5.156 2.855-7.345 1.159 1.038 1.702 1.706 2.461 2.849.626-.158 1.705-.161 2.363 0 .792-1.201 1.333-1.866 2.461-2.849 3.764 4.989 2.736 8.65 2.691 8.849 2.108.819 4.24 2.061 5.916 3.579-.714-2.775-.713-4.724 1.513-7.111.907-.97 2.359.401 1.461 1.363-1.498 1.608-1.588 2.891-1.262 4.324.712 3.137 1.541 4.715 1.541 7.148zm-18.005-12.993c-.386 0-.7.315-.7.701 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.701-.7-.701zm5.7.701c0 .385-.314.7-.7.7-.386 0-.701-.315-.701-.7 0-.386.315-.701.701-.701.386 0 .7.315.7.701z"/></svg></i>';
            $Modal                              .= '</p>';
        }
        
        $Modal                                  .= '</div>';
        $Modal                                  .= '</div>';
        
        return $Modal;
    }
}