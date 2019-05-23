<?php


/**
 * @param $arr
 * @param string
 * @return  string
 * this function check the spelling of each inputs
 */
function checkSpelling($arr)
{

    $result = "Success ! ";
//    if (!preg_match('/(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/', $arr['name'], $array_name)) {
//        return "Name!!!";
//    }
//    if (!preg_match('/(?=^.{0,60}$)^[a-zA-Z-]+\s[a-zA-Z-]+\s[a-zA-Z-]+\s+\d{0,10}+$/', $arr['address'])) {
//        return "Check Address";
//    }
    if (!preg_match('/^\+[9]{1}[6]{1}[1]{1}+\s\d{8}$/', $arr['phone'])) {
        return "Local phone!!!";
    }
    if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/', $arr['email'], $array_email)) {
        return "Email!!!";
    }

    return $result;
}





