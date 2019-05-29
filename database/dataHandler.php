<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-09
 * Time: 16:08
 */

session_start();

if (mysqli_connect_error()) {
    header("Location: ../userLogin/login.php");
    die();
} else {
    require "../control/dbControl/UserControl.php";
    $tools = new userControl();
    $message = "wrong info !!";
    if (isset($_POST['login'])) {
        $tools->clearCurrentUsers();
        if ($tools->containsDatabaseUser($_POST)) {
            $userId = $tools->setCurrentUser($_POST);

            if ($tools->typeOfUser($_POST)) {
                header("Location: ../admin/adminNavigator.php?user=$userId");
                $_SESSION['qazmkoAdmin'] = $userId;
            } else {
                header("Location: ../user/userNavigator.php?user=$userId");
                $_SESSION['qazmko'] = $userId;
            }
        } else {
            header("Location: ../userLogin/login.php?id=" . $message);
        }

    } else if (isset($_POST['logout'])) {

        if (isset($_SESSION['qazmko'])) {
            $tools->delCurrentUser($_SESSION['qazmko']);
            unset($_SESSION['qazmko']);
        };
        if (isset($_SESSION['qazmkoAdmin'])) {
            $tools->delCurrentUser($_SESSION['qazmkoAdmin']);
            unset($_SESSION['qazmkoAdmin']);
        };
        header("Location: ../index.php");

    } else if (isset($_POST['register'])) {
        if ($tools->containsDatabaseNewUser($_POST)) {
            header("Location: ../userLogin/setNewPassword.php?id=" . $_POST['email']);
        } else {
            header("Location: ../userLogin/register.php?id=" . $message);
        }
    } else if (isset($_POST['set'])) {

        if ($tools->setNewUserInfo($_POST, $_GET['id'])) {
            header("Location: ../userLogin/login.php?id=success");
        } else {
            header("Location: ../userLogin/login.php?id=" . $message);
        }
    }

}





