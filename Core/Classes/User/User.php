<?php
namespace User;

class User
{
    # 1 variables
    private $DBAuth                             = false;
    private $AdminUser                          = null;
    private $AdminPassword                      = null;
    
    private $UserID                             = null;
    private $Role                               = ROLE_ANONYMOUS;
    
    # 2 magic methods
    public function __construct($Config)#: void
    {
        $this->DBAuth                           = $Config->DBAuth;
        $this->AdminUser                        = $Config->AdminUser;
        $this->AdminPassword                    = $Config->AdminPassword;
        
        $this->SessionAuth();
    }
    
    public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'Auth':
                return $this->authUser();
                
            case 'User':
                return $this->User;
                
            case 'UserID':
                return $this->UserID;
                
            case 'Role':
                return $this->Role;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'DBAuth'                            => $this->DBAuth,
            'UserID'                            => $this->UserID,
            'Role'                              => $this->Role
        );
    }
    
    # 3 public methods
    private function authUser(): bool
    {
        $LoginRequest                           = filter_input(INPUT_GET,'LGNRQST');
        
        if($LoginRequest == 1)
        {
            if($this->DBAuth && $this->DBAuth())
            {
                return true;
            }
            elseif($this->LocalAuth())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    
    private function LocalAuth(): bool
    {
        $LoginUser                              = filter_input(INPUT_POST,'User');
        $LoginPassword                          = filter_input(INPUT_POST,'Password');
        
        if($this->AdminUser !== false && ($LoginUser === $this->AdminUser && $LoginPassword === $this->AdminPassword))
        {
            $this->UserID                       = $LoginUser;
            $this->Role                         = ROLE_ADMIN;
            
            $_SESSION['User']                   = array
            (
                'ID'                                => $this->UserID,
                'Role'                              => $this->Role
            );
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    private function DBAuth(): bool
    {
        $LoginUser                              = filter_input(INPUT_POST,'User');
        $LoginPassword                          = filter_input(INPUT_POST,'Password');
        
        $LoginPasswordHashed                    = md5($LoginPassword);
        $DB                                     = DB($DB, $DBConfig['Main']);
        $LoginQuery                             = 'SELECT * FROM users WHERE `username` LIKE :User AND `password` LIKE :Password';
        $LoginResult                            = $DB->query($LoginQuery, array('User' => $LoginUser, 'Password' => $LoginPasswordHashed));
        
        if($LoginResult && $LoginResult->rowCount() > 0)
        {
            $UserData                           = $LoginResult->fetchAll(PDO::FETCH_ASSOC)[0];
            $this->UserID                       = $UserData['id'];
            $this->Role                         = ROLE_ANONYMOUS;
            
            $_SESSION['User']                   = array
            (
                'ID'                                => $this->UserID,
                'Role'                              => $this->Role
            );
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    private function SessionAuth(): void
    {
        if(isset($_SESSION['User']) && isset($_SESSION['User']['ID']) && isset($_SESSION['User']['Role']))
        {
            $this->UserID                       = $_SESSION['User']['ID'];
            $this->Role                         = $_SESSION['User']['Role'];
        }
    }
}