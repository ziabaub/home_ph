<?php


/**
 * @param $arr
 * @param string
 * @return  InfoCo
 * this function check the spelling of each inputs
 */
function checkSpellingAndReturnNewInfo($arr,&$result)
{
    $check = true;
    $result = "Success ! ";
//    if (!preg_match('/(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/', $arr['name'], $array_name)) {
//        $result = "Check Name";
//        $check = false;
//    } else if (!preg_match('/(?=^.{0,60}$)^[a-zA-Z-]+\s[a-zA-Z-]+\s[a-zA-Z-]+\s+\d{0,10}+$/', $arr['address'])) {
//        $check = false;
//        $result = "Check Address";
    if (!preg_match('/^\+[9]{1}[6]{1}[1]{1}+\s\d{8}$/', $arr['phone'])) {
        $check = false;
        $result = "Check Phone";
    } else if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/', $arr['email'], $array_email)) {
        $check = false;
        $result = "Check Email";
    }


    if ($check == "Success ! ") {
        require_once __DIR__.'/../../entity/InfoUser.inc';
        return new InfoCo(ucwords($arr['name']), $arr['address'], $arr['phone'], $arr['email'] , $arr['perm']);
    } else {
        return null;
    }

}





