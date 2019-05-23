<?php
/*/**
 * Created by PhpStorm.
 * User: ziad al sarrih
 * Date: 2019-05-9
 * Time: 17:11
 */

require_once __DIR__ . '/../../database/dbData.php';

class userControl
{
    private $connection;

    /**
     * userControl constructor.
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(host, user, pass, database);
    }

    /**
     * @return mysqli
     */
    public function getConnection(): mysqli
    {
        return $this->connection;
    }


    /**
     * @param $tableName
     * @param $data
     * @return boolean
     * this function is to check into specific table into databases
     * for a specific user if contains
     */
    public function containsDatabaseUser($data)
    {
        $query = 'select* from ' . table_user_info;
        $result = mysqli_query($this->connection, $query);


        if (!$result) {
            die();
        } else {
            $username = hash('sha256', $data['username']);
            $password = hash('sha256', $data['password']);


            while ($row = mysqli_fetch_assoc($result)) {
                if ((strcasecmp($username, $row['username']) == 0) && (strcasecmp($password, $row['password']) == 0)) {
                    mysqli_free_result($result);
                    return true;
                }
            }
            mysqli_free_result($result);
            return false;

        }
    }

    public function userIsALive($data)
    {
        $query = 'select* from ' . table_current_users;
        $result = mysqli_query($this->connection, $query);


        if (!$result) {
            die();
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                if (strcasecmp($data, $row['hash']) == 0) {
                    mysqli_free_result($result);
                    return true;
                }
            }
            mysqli_free_result($result);
            return false;

        }
    }

    public function typeOfUser($data)
    {
        $query = 'select* from ' . table_user_info;
        $result = mysqli_query($this->connection, $query);


        if (!$result) {
            die();
        } else {
            $username = hash('sha256', $data['username']);
            $password = hash('sha256', $data['password']);


            while ($row = mysqli_fetch_assoc($result)) {
                if ((strcasecmp($username, $row['username']) == 0) && (strcasecmp($password, $row['password']) == 0) && (strcasecmp("100", $row['permission']) == 0)) {
                    mysqli_free_result($result);
                    return true;
                }
            }
            mysqli_free_result($result);
            return false;

        }
    }

    public function containsDatabaseNewUser($data)
    {
        $query = 'select* from ' . table_user_info;
        $result = mysqli_query($this->connection, $query);
        $user = "user";
        if (!$result) {
            die();
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['username'];
                if ((strcasecmp($data['email'], $row['email']) == 0) && (strcasecmp($user, $row['username']) == 0)) {

                    mysqli_free_result($result);
                    return true;
                }
            }
            mysqli_free_result($result);
            return false;

        }
    }

    public function setNewUserInfo($data, $email)
    {
        $username = hash('sha256', $data['username']);
        $password = hash('sha256', $data['password']);

        $query = "update " . table_user_info . " set username = '" . $username . "' , password = '" . $password . "' where email = '" . $email . "'";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            mysqli_free_result($result);
            die();
        } else {
            mysqli_free_result($result);
            return true;
        }

    }

    /**
     * @param $arr
     * @return string
     */
    public function setCurrentUser($arr)
    {
        $user = hash('sha256', $arr['username']) . time();
        $user = hash('sha256', $user);
        $time = time() + 662011;

        $query = 'insert into' . ' current_users ( hash ,time ) values (' . "'" . $user . "' ," . "'" . $time . "'" . ')';
        mysqli_query($this->connection, $query);

        return $user;

    }

    public function delCurrentUser($arr)
    {
        $query = 'delete from' . ' current_users where hash = ' . "'" . $arr . "'";
        mysqli_query($this->connection, $query);

    }

    public function clearCurrentUsers()
    {
        $time = time() + 662011 - (60 * 60 * 24);
        $query = 'delete from' . table_current_users . ' where time < ' . $time;
        //echo "<script type='text/javascript'>alert('$query');</script>";
        mysqli_query($this->connection, $query);
        return false;
    }

    public function setArticle($name, $contents, $author, $file)
    {
        $extensions = array('jpg', 'png', 'gif', 'jpeg');
        $ext = explode('.', $file['userFile']['name']);
        $ext = end($ext);
        $Contents = str_replace("'", '"', $contents);
        $Name = str_replace("'", '"', $name);
        $Author = str_replace("'", '"', $author);
        if (!in_array($ext, $extensions)) {
            ?>
            <div><?php echo "image required" ?></div><?php
        } else {
            $imgDir = '../webImg/' . $file['userFile']['name'];
            move_uploaded_file($file['userFile']['tmp_name'], $imgDir);
            $sql = "insert into" . " articles (name , img , contents , author ) values ('$Name','$imgDir','$Contents','$Author')";
           // echo $sql;
            $this->connection->query($sql) or die();
        }
    }

    public function updateArticle($name, $contents, $author, $file, $id)
    {
        if ($file['userFile']['size'] != 0) {
            $extensions = array('jpg', 'png', 'gif', 'jpeg');
            $ext = explode('.', $file['userFile']['name']);
            $ext = end($ext);

            if (!in_array($ext, $extensions)) {
                ?>
                <div><?php echo "Wrong img extension " ?></div><?php
            } else {
                $imgDir = '../webImg/' . $file['userFile']['name'];
                move_uploaded_file($file['userFile']['tmp_name'], $imgDir);
                $sql = "update" . " articles set name = '" . $name . "',img = '" . $imgDir . "', contents = '" . $contents . "', author = '" . $author . "' where name = '" . $id . "'";
                //echo $sql;
                $this->connection->query($sql) or die();
            }
        } else {

            $sql = "update" . " articles set name = '" . $name . "', contents = '" . $contents . "', author = '" . $author . "' where name = '" . $id . "'";
            // echo $sql;
            $this->connection->query($sql) or die();

        }


    }


    public function getArticle()
    {

        $sql = "select * from" . " articles ";
        $result = mysqli_query($this->connection, $sql);
        return $result;

    }

    public function getArticleByName($name)
    {
        $result = $this->getArticle();
        while ($row = mysqli_fetch_assoc($result)) {
            if ((strcasecmp($name, $row['name']) == 0)) {
                return $row;
            }
        }
        return null;
    }

    public function deleteArticles($name)
    {
        $query = 'delete from' . ' articles ' . 'where name = ' . "'" . $name . "'";
        mysqli_query($this->connection, $query);
    }
}
