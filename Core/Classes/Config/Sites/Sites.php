<?php
namespace Config\Sites;

class Sites
{
    use \Config\Sites\CoreSites;
    use \Configs\Sites;
    
    private $SitesIndex                             = array();
    
    public function __construct()
    {
        $this->SitesIndex                           = array_merge($this->CoreSites, $this->Sites);
    }
    
    public function __get($Var)#: ?mixed
    {
        if(isset($this->SitesIndex[$Var]))
        {
            return $this->SitesIndex[$Var];
        }
        elseif($Var == 'all')
        {
            return $this->SitesIndex;
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
            'SitesIndex'                            => $this->SitesIndex
        );
    }
}