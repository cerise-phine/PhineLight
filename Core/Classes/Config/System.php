<?php
namespace Config;

class System
{
    use \Configs\System;
    
    public function __get($Var)#: ?mixed
    {
        switch($Var)
        {
            case 'Debug':
                return $this->Debug;
                
            case 'Tracking':
                return $this->Tracking;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Debug'                                 => $this->Debug,
            'Tracking'                              => $this->Tracking
        );
    }
}