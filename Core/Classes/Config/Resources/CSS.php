<?php
namespace Config\Resources;

class CSS
{
    use \Configs\Resources\CSS;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->CSS[$Var]))
        {
            return $this->CSS[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->CSS;
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
            'CSS'                                   => $this->CSS
        );
    }
}