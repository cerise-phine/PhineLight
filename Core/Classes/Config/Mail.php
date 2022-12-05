<?php
namespace Config;

class Mail
{
    use \Configs\Mail;
    
    public function __get($Var): ?array
    {
        if(isset($this->MailProviders[$Var]))
        {
            return $this->MailProviders[$Var];
        }
        else
        {
            return null;
        }
    }
    
    public function __debugInfo(): array
    {
        $Return                                 = array();
        
        foreach($this->MailProviders as $MailProvider => $Config)
        {
            $Return[]                           = $MailProvider;
        }
        
        return $Return;
    }
}