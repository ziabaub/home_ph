<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form </title>
    <link rel="stylesheet" href="loginStyleSheet.css" type="text/css">
</head>
<body>
<div class="contact-title">
    <h1>Register</h1>
</div>

<div class="contact-form">
    <?php $email = $_GET['id']?>
    <form id="contact-form" method="post" action="../database/dataHandler.php?id=<?php echo $email?>">
        <input name="username" type="text" class="form-control" placeholder="username" required>
        <br>
        <input name="password" type="password" class="form-control" placeholder="password" required>
        <br>
        <input type="submit" class="form-control submit" name="set" value="Set info"><br>
        <label style="color: #ebebeb"><?php if (isset($_GET['id'])) echo $_GET['id']?></label>

    </form>

</div>

</body>
</html>