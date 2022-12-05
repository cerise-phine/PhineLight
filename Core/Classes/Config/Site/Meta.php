<?php
namespace Config\Site;

class Meta
{
    use \Configs\Site\Meta;
    
    public function __get($Var)#: ?mixed
    {
        switch($Var)
        {
            case 'Title':
                return $this->Title;
                
            case 'Language':
                return $this->Language;
                
            default:
                if(isset($this->Meta[$Var]))
                {
                    return $this->Meta[$Var];
                }
                elseif($Var == 'all')
                {
                    return $this->Meta;
                }
                else
                {
                    return null;
                }
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'Title'                                 => $this->Title,
            'Language'                              => $this->Language,
            'Meta'                                  => $this->Meta
        );
    }
}