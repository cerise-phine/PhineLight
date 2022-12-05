<?php
namespace Config;

class User
{
    use \Configs\User;
    
    public function __get($Var)#: ?mixed
    {
        switch($Var)
        {
            case 'AdminUser':
                return $this->AdminUser;
                
            case 'AdminPassword':
                return $this->AdminPassword;
                
            case 'DBAuth':
                return $this->DBAuth;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'AdminUser'                             => ($this->AdminUser ? '***' : false),
            'AdminPassword'                         => ($this->AdminPassword ? '***' : false),
            'DBAuth'                                => $this->DBAuth
        );
    }
}