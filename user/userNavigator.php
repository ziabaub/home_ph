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
if (isset($_SESSION['qazmko']) && ($userCont->userIsALive($_SESSION['qazmko']))) {
    include_once ('../gettext/langTools.php');
} else {
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('User Navigator') ?></title>
    <link rel="stylesheet" href="../userLogin/loginStyleSheet.css">
</head>
<body>
<div class="contact-title">
    <h1><?php echo __('User Page') ?> </h1>
</div>
<div class="contact-form">
    <form id="contact-form" method="post" action="../user/userPage.php">
        <input name="myPage" type="submit" class="form-control submit" value="<?php echo __('My Page') ?>">
        <br>
    </form>
    <form id="contact-form" method="post" action="../user/userPage.php">
        <input name="Profile" type="submit" class="form-control submit" value="<?php echo __('Profile') ?>">
        <br>
    </form>
    <form id="contact-form" method="post" action="../database/dataHandler.php">
        <input name="logout" type="submit" class="form-control submit" value="<?php echo __('Logout') ?>">
        <br>
    </form>


</div>


</body>
</html>