<?php

class Sanitize{
    public static function arr($array){
        foreach ($array as &$member) {
            foreach ($member as $key => $value) {
                $member[$key] = htmlentities($value);
            }
        }
        return $array;
    }
}