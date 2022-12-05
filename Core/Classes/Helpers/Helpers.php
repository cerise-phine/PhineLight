<?php
namespace Helpers;
trait Helpers
{
    public static function SEOString($String)
    {
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", ".");
        return urlencode(str_replace($replacements, '', $String));
    }
    
    public static function DB($DB, $DBConfig)
    {
        if(is_null($DB))
        {
            $DB                                 = new \Helpers\Database\Database($DBConfig);
            $DB->connect;
            return $DB;
        }
        else
        {
            return $DB;
        }
    }
    
    public static function Tracking($DBTracking)
    {
        if($Tracking === true && !$User)
        {
            $DBTracking                             = DB($DBTracking, $DBConfig['Tracking']);
            $TrackingData                           = array
            (
                'url'                                   => $RequestString,
                'referer'                               => (!strpos($Referer,$ServerName) ? $Referer : $RootURL),
                'session_id'                            => session_id()
            );
            $DBTracking->insert('raw',$TrackingData);
        }
    }
}