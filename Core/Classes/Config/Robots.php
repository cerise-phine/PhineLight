<?php
namespace Config;

class Robots
{
    use \Configs\Robots;
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->UserAgents[$Var]))
        {
            return $this->UserAgents[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->UserAgents;
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
            'UserAgents'                            => $this->UserAgents
        );
    }
}