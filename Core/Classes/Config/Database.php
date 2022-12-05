<?php
namespace Config;

class Database
{
    use \Configs\Database;
    
    public function __get($Var): ?array
    {
        if(isset($this->Databases[$Var]))
        {
            return $this->Databases[$Var];
        }
        else
        {
            return null;
        }
    }
    
    public function __debugInfo(): array
    {
        $Return                                 = array();
        
        foreach($this->Databases as $Database => $Config)
        {
            $Return[]                           = $Database;
        }
        
        return $Return;
    }
}