<?php

class MyHelpers
{
    public static function diffHoursInMinutes($ini="00:00",$fin="00:00"){
        $m_ini=self::hoursToMinutes($ini);
        $m_fin=self::hoursToMinutes($fin);

        if($m_fin > $m_ini)
            return ($m_fin-$m_ini);
        else{
            return (self::hoursToMinutes('23:59')-$m_ini)+$m_fin+1;
        }

    }

    public static function hoursToMinutes($hour='0:0'){
        return (date('G',strtotime($hour))*60)+date('i',strtotime($hour));
    }
}