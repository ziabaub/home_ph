<?php
/*/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-04-14
 * Time: 17:11
 */

require_once __DIR__ . '/../../entity/InfoUser.inc';
require_once __DIR__ . '/../../database/dbData.php';


class adminDbControl
{

    private $info;
    private $connection;

    function __construct()
    {
        $this->info = array();
        $this->connection = mysqli_connect(host, user, pass, database);

    }

    /**
     * @param $connection
     * @param $tableName
     * this function is to write into specific table into databases
     */
    public function readFrom()
    {
        $query = 'select* from ' . table_user_info;
        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            die();
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($this->info, new InfoCo($row['name'], $row['address'], $row['phone'], $row['email'], $row['permission']));
            }
            mysqli_free_result($result);

        }
    }

    /**
     * @param $connection
     * @param $tableName
     * @param $fields
     * @param $values InfoCo
     * @param $perm
     * @return boolean
     */
    public function writeInto($values, $perm)
    {
        $data = "'" . $values->__get('name')
            . "','" . $values->__get('address')
            . "','" . $values->__get('phone')
            . "','" . $values->__get('email')
            . "','" . $perm . "'";

        $query = 'insert into' . ' ' . table_user_info . ' (' . fields . ') values (' . $data . ')';

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }


    }

    function checkRes($result)
    {

        if (!$result) {

            echo "Error Request or table name doesn't exist ";
            die();
        }
    }

    /**
     * @param $connection
     * @param $tableName
     * @param $values string
     */
    public function deleteFrom($values)
    {

        $query = 'delete from' . ' ' . table_user_info . ' ' . 'where email = ' . "'" . $values . "'";
        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            die();
        }
    }


    /**
     * @return array
     */
    public function getInfo(): array
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function displayEmployeeInformation()
    {
        $res = "";
        $count = 1;
        foreach ($this->info as $e) {
            $res .= '<h3>User : ' . '[' . $count . ']</h3>' .
                '* Name : ' . $e->__get('name') .
                '<br>' . '* Address :  ' . $e->__get('address') .
                '<br>' . '* Phone :  ' . $e->__get('phone') .
                '<br>' . '* E-mail :  ' . $e->__get('email') .
                '<br>' . '* Permission :  ' . $e->__get('permission');
            $count++;
        }
        return $res;
    }

    /**
     * @param $in string
     * @return string
     */
    public function displayEmployeeInformationByName($in)
    {

        $res = "";
        $count = 1;
        $name = ucwords(trim($in));
        foreach ($this->info as $e) {
            $current = trim($e->__get('name'));
            if (($current == $name) && (strlen($current) == strlen($name))) {
                $res .= '<h3>User : ' . '[' . $count . ']</h3>' .
                    '* Name : ' . $e->__get('name') .
                    '<br>' . '* Address :  ' . $e->__get('address') .
                    '<br>' . '* Phone :  ' . $e->__get('phone') .
                    '<br>' . '* E-mail :  ' . $e->__get('email') .
                    '<br>' . '* Permission :  ' . $e->__get('permission');
            }
            $count++;

        }
        return $res;
    }


}
