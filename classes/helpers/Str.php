<?php 

namespace helpers;

class Str 

{

        static public function limit($str)
    {
        if(strlen($str)>20)
        {
            $str=substr($str,0,20).'...';
            
        }
        return $str;
    }
}

?>