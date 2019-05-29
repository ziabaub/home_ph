<?php

include_once ('../gettext/langTools.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('Contact Form') ?> </title>
    <link rel="stylesheet" href="loginStyleSheet.css" type="text/css">
</head>
<body>
<div class="contact-title">
    <h1><?php echo __('register') ?></h1>
</div>

<div class="contact-form">
    <form id="contact-form" method="post" action="../database/dataHandler.php">
        <input name="email" type="text" class="form-control" placeholder="<?php echo __('Your email') ?>" required>
        <br>
        <input type="submit" class="form-control submit" name="register" value="<?php echo __('Register') ?>"><br>
        <label style="color: #ebebeb"><?php if (isset($_GET['id'])) echo $_GET['id'] ?></label>

    </form>

</div>

</body>
</html>