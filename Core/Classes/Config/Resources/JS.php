<?php
namespace Config\Resources;

class JS
{
    use \Configs\Resources\JS;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->JS[$Var]))
        {
            return $this->JS[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->JS;
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
            'JS'                                    => $this->JS
        );
    }
}