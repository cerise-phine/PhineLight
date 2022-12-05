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

class Request
{
    # 1 variables
    private $URI                                = null;
    private $String                             = null;
    private $File                               = null;
    private $Path                               = null;
    private $Type                               = null;
    private $Site                               = null;
    
    private $ScriptName                         = null;
    private $ServerName                         = null;
    private $Scheme                             = null;
    private $Referer                            = null;
    private $RootURL                            = null;
    
    # 2 magic methods
    public function __construct()#: void
    {
        $this->URI                              = filter_input(INPUT_SERVER,'REQUEST_URI');
        $this->String                           = filter_input(INPUT_GET,'R');
        $this->initRequest();
        $this->initScript();
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'URI':
                return $this->URI;
                
            case 'String':
                return $this->String;
                
            case 'File':
                return $this->File;
                
            case 'Path':
                return $this->Path;
                
            case 'Type':
                return $this->Type;
                
            case 'Site':
                return $this->Site;
                
            case 'ScriptName':
                return $this->ScriptName;
                
            case 'ServerName':
                return $this->ServerName;
                
            case 'Scheme':
                return $this->Scheme;
                
            case 'Referer':
                return $this->Referer;
                
            case 'RootURL':
                return $this->RootURL;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'URI'                                   => $this->URI,
            'String'                                => $this->String,
            'File'                                  => $this->File,
            'Path'                                  => $this->Path,
            'Type'                                  => $this->Type,
            'Site'                                  => $this->Site,
            'ScriptName'                            => $this->ScriptName,
            'ServerName'                            => $this->ServerName,
            'Scheme'                                => $this->Scheme,
            'Referer'                               => $this->Referer,
            'RootURL'                               => $this->RootURL
        );
    }
    
    # public methods
    public function URL($Element = false): string
    {
        if(is_numeric($Element) && !is_null($this->Path->getElement($Element)))
        {
            $RootURL                            = $this->RootURL;
            
            for($i=0;$i<=$Element;$i++)
            {
                $RootURL                        .= $this->Path->getElement($i) . ($i == $Element ? '' : '/');
            }
            
            return $RootURL;
        }
        elseif($Element === true)
        {
            return $this->RootURL . $this->String;
        }
        else
        {
            return $this->RootURL;
        }
    }
    
    # private methods
    private function initRequest(): void
    {
        if($this->String && strpos($this->String, '.'))
        {
            list($FileDirty, $TypeDirty)        = explode('.', $this->String);
            $this->File                         = $FileDirty;
            $this->Type                         = strtolower($TypeDirty);
        }
        else
        {
            $this->String                       = 'index.html';
            $this->File                         = 'index';
            $this->Type                         = 'html';
        }
        
        if(strpos($this->File, '/'))
        {
            $Elements                           = explode('/', $this->File);
            $this->Path                         = new Path($Elements);
            $this->Site                         = $this->Path->getElement(0);
        }
        else
        {
            $this->Path                         = new Path($this->File);
            $this->Site                         = $this->File;
        }
    }
    
    private function initScript(): void
    {
        $this->ScriptName                       = filter_input(INPUT_SERVER,'SCRIPT_NAME');
        $this->ServerName                       = filter_input(INPUT_SERVER,'SERVER_NAME');
        $this->Scheme                           = filter_input(INPUT_SERVER,'REQUEST_SCHEME');
        $this->Referer                          = filter_input(INPUT_SERVER,'HTTP_REFERER');
        $this->RootURL                          = $this->Scheme . '://' . $this->ServerName . str_replace('index.php','',$this->ScriptName);
    }
}