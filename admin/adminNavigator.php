<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-09
 * Time: 21:54
 */
session_start();
require '../control/dbControl/UserControl.php';
$userCont = new userControl();
if (isset($_SESSION['qazmkoAdmin'])&&($userCont->userIsALive( $_SESSION['qazmkoAdmin']))) {
    include_once ('../gettext/langTools.php');
}else{
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('Admin Navigator') ?></title>
    <link rel="stylesheet" href="../userLogin/loginStyleSheet.css">
</head>
<body>
<div class="contact-title">
    <h1><?php echo __('Admin Page') ?> </h1>
</div>
<div class="contact-form">
    <form id="contact-form" method="post" action="../admin/adminPage.php">
        <input name="user_management" type="submit" class="form-control submit" value="<?php echo __('User Management') ?>">
        <br>
    </form>
    <form id="contact-form" method="post" action="../admin/adminPageManagement.php">
        <input name="user_page_management" type="submit" class="form-control submit" value="<?php echo __('Page Management') ?>" >
        <br>
    </form>
    <form id="contact-form" method="post" action="../database/dataHandler.php">
        <input name="logout" type="submit" class="form-control submit" value="<?php echo __('Logout') ?>" >
        <br>
    </form>


</div>


</body>
</html>