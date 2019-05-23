<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-10
 * Time: 00:58
 */
session_start();
require '../control/dbControl/UserControl.php';
require '../control/textControl/printTools.php';
$userCont = new userControl();
$printer = new Printer();
if (isset($_SESSION['qazmko']) && ($userCont->userIsALive($_SESSION['qazmko']))) {
} else {
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>News</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


</head>
<body>

<div class="container">

    <h3 class="center" style="margin-bottom:20px;">search Engine <i class="material-icons medium hide-on-small-only"
                                                                    id="icons"></i></h3>

    <form action="./userPage.php?name=<?php ?>" method="post">
        <div class="input-field">
            <i class="material-icons prefix">public</i>
            <input type="text" name="search-field" id="searchquery" required>
            <label>Find a specific word ......</label>
        </div>

        <div class="row">
            <input type="submit" name="search" id="searchBtn" class="btn col m2 s12" value="search">
            <input type="reset" id="resetBtn" class="btn col m2 s12 red right" value="clear" style="margin-top:3px;">
        </div>

    </form>
    <!-- loader style can i visit ajaxloader or materialize -->
    <div id="loader" style="display:none;">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div class="row">
        <div id="newsResults"></div>
        <br><br>
        <?php
       // print_r($_POST);
        $result = $userCont->getArticle();
        if (!isset($_POST['search'])) {

            echo $printer->printDbResult($result);
        }else{
            $printer->setWords($_POST['search-field']);
            echo $printer->printDbResultWithSWord($result,$_POST['search-field']);
        }

        ?>
        <input type="submit" id="getMore" class="btn col m2 s12" value="more">
    </div>

    <div><br/>
        <form action="userNavigator.php?" method="post">
            <input type="submit" class="btn col m2 s12" name="back" value="user Panel"/>
        </form>
    </div>

</div>


</body>
</html>

