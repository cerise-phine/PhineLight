<?php
namespace Config\Site;

class Site
{
    private $Meta                               = null;
    private $Template                           = null;
    private $Social                             = null;
    
    public function __construct()#: void
    {
        $this->Meta                             = new Meta;
        $this->Template                         = new Template;
        $this->Social                           = new Social;
    }
    
    public function __get($Var)#: ?mixed
    {
        switch($Var)
        {
            case 'Meta':
                return $this->Meta;
                
            case 'Template':
                return $this->Template;
                
            case 'Social':
                return $this->Social;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Meta'                                  => $this->Meta,
            'Template'                              => $this->Template,
            'Social'                                => $this->Social
        );
    }
}