<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-02-24
 * Time: 12:35
 */

require ("tools.php");
if (isset($_POST)){

    $toSendArr=sortPost($_POST);

}

?>


<!DOCTYPE html>
<html lang ="en">
<head>
    <title>control </title>
</head>
<body>
<h1>Login page </h1>

<li style="list-style-type: none " >


    Full Address: <input name="Full Address" value="
    <?php

        foreach ($toSendArr as $value) {
            echo $value . ", ";
        }

    ?>" style="width: 500px" >

    <br/></li>

</body>
</html>



