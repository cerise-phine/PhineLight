<?php
namespace Config\Site;

class Template
{
    use \Configs\Site\Template;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->Template[$Var]))
        {
            return $this->Template[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->Template;
        }
        else
        {
            return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Template'                              => $this->Template
        );
    }
}