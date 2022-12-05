<?php
namespace Config\Site;

class Social
{
    use \Configs\Site\Social;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->Social[$Var]))
        {
            return $this->Social[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->Social;
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
            'Social'                                => $this->Social
        );
    }
}