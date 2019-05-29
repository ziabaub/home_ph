
<?php

include_once ('../gettext/langTools.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('Register Form ') ?></title>
    <link rel="stylesheet" href="loginStyleSheet.css" type="text/css">
</head>
<body>
<div class="contact-title">
    <h1><?php echo __('Register') ?></h1>
</div>

<div class="contact-form">
    <?php $email = $_GET['id']?>
    <form id="contact-form" method="post" action="../database/dataHandler.php?id=<?php echo $email?>">
        <input name="username" type="text" class="form-control" placeholder="<?php echo __('username') ?>" required>
        <br>
        <input name="password" type="password" class="form-control" placeholder="<?php echo __('password') ?>" required>
        <br>
        <input type="submit" class="form-control submit" name="set" value="<?php echo __('Set info') ?>"><br>
        <label style="color: #ebebeb"><?php if (isset($_GET['id'])) echo $_GET['id']?></label>

    </form>

</div>

</body>
</html>