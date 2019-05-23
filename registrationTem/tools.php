<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-02-24
 * Time: 11:43
 * @param $arr
 * @return array
 */


function sortPost($arr){

if (checkInput($arr)){

    $toSendArr = explode(",", $arr["Country"]);
    $toSendArr = array_merge($toSendArr, explode(",", $arr["City"]));
    $toSendArr = array_merge($toSendArr, explode(",", $arr["Town"]));
    $toSendArr = array_merge($toSendArr, explode(",", $arr["Street"]));
    $toSendArr = array_merge($toSendArr, explode(",", $arr["Block"]));
    sort($toSendArr);

    if (checkNumeric($toSendArr)){
        error(1);
        return array("no address found ");
    }else {
        $toSendArr = makItUpper($toSendArr);
        return $toSendArr;
    }

}else{
    error(1);
    return array("no address found ");
}

}

/**
 * @param $arr
 * @return bool
 * this function to check
 * if the content are empty
 */
function checkInput($arr)
{   $emptyArr = true;
    foreach ($arr as $value => $arrayValue ){
        if (empty($arrayValue)){
            $emptyArr=false;
        }
    }

    return $emptyArr;

}

/**
 * @param $arr
 * @return bool
 * this function to check if field contain only number
 *
 */
function checkNumeric($arr){
    $numeric = false;
if(is_array($arr)) {
    foreach ($arr as $element => $item) {
        if (is_numeric($item)) {
            $numeric = true ;
            //echo print_r($item);
        }

    }
}
    return $numeric;
}

/**
 * to post a error to the user
 * @param $value
 */
function error($value )
{
    if ($value == 1) {
        echo '<script language="javascript">';
        echo 'alert("you have to fill all contents and not allowed to put only numbers  ")';
        echo '</script>';
    }else if ($value ==2){
        echo '<script language="javascript">';
        echo 'alert("no file available!! ")';
        echo '</script>';
    }
}

/**
 * @param $arr
 * @return array
 * this function make all first char upper
 */
function makItUpper($arr){
    $temp = $arr;
   array_walk($temp,function (&$value){
       $value=ucfirst($value);
   });

    return$temp;
}

/**
 * @return string
 * this function read from file
 */
function readFromFile(){
    $filename = "needittext.txt";
    $file = fopen($filename ,"r");
    if ($file==false){
        error(2);
        exit();
    }
    $fileSize = filesize($filename);
    $fileText = fread($file,$fileSize);
    fclose($file);

    return$fileText;
}

/**
 * @param array
 * @return array
 */
function deleteRepeat ($arr){
    $toSendArr = explode(",", $arr["Value"]);
    $toSendArr = makItUpper($toSendArr);

    return array_unique($toSendArr);
}

/**
 * @param $arr
 * @return string
 */
function getUrl($arr){
    if (isset($arr['name'])) {
        return  $arr['name']." Company is Set it ";
    }else{
        return  "Add Your Company";
    }
}

