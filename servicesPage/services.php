<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-03-07
 * Time: 10:20
 */

require("registrationTem/tools.php");
$text = readFromFile();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="services.css">
</head>
<body>
<h1>Services Page  </h1>

<div class="textAreaBlock">

    <textarea class="textArea"><?php echo $text ?></textarea>

</div>

</body>
</html>
