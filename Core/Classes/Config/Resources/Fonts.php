<?php
namespace Config\Resources;

class Fonts
{
    use \Configs\Resources\Fonts;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->Fonts[$Var]))
        {
            return $this->Fonts[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->Fonts;
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
            'Fonts'                                 => $this->Fonts
        );
    }
}