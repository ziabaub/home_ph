<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-04-14
 * Time: 14:28
 */

class InfoCo{

    private $name;
    private $address;
    private $phone;
    private $email;
    private $permission;


    function __construct($name,$address,$phone,$email,$permission)
    {
        $this->name=$name;
        $this->address=$address;
        $this->phone=$phone;
        $this->email=$email;
        $this->permission=$permission;

    }



    function __set($name, $value)
    {
        switch ($name){
            case 'name':
                $this->name=$value;
                break;
            case 'address':
                $this->address=$value;
                break;
            case 'phone':
                $this->phone=$value;
                break;
            case 'email':
                $this->email=$value;
                break;
            case 'permission':
                $this->permission=$value;
                break;

        }
    }

    function __get($name)
    {
        switch ($name){
            case 'name':
                return $this->name;
            case 'address':
                return $this->address;
            case 'phone':
                return $this->phone;
            case 'email':
                return  $this->email;
            case 'permission':
                return  $this->permission;

        }
    }


}