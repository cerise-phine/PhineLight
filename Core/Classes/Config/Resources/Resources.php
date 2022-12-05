<?php
namespace Config\Resources;

class Resources
{
    use \Configs\Resources\Favicon;
    
    private $CSS                                = null;
    private $JS                                 = null;
    private $Fonts                              = null;
    
    public function __construct()#: void
    {
        $this->CSS                              = new CSS;
        $this->JS                               = new JS;
        $this->Fonts                            = new Fonts;
    }
    
    public function __get($Var)#: ?mixed
    {
        switch($Var)
        {
            case 'CSS':
                return $this->CSS;
                
            case 'JS':
                return $this->JS;
                
            case 'Fonts':
                return $this->Fonts;
                
            case 'Favicon':
                return $this->Favicon;
                
            default:
                return null;
        }
    }
    
    public function __debugInfo(): array
    {
        return array
        (
            'CSS'                                   => $this->CSS,
            'JS'                                    => $this->JS,
            'Fonts'                                 => $this->Fonts,
            'Favicon'                               => $this->Favicon
        );
    }
}