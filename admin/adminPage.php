<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-04-14
 * Time: 14:21
 */
session_start();


require '../control/dbControl/adminDbControl.inc';
require '../control/textControl/spellingCheckAndGetNewInfoUser.php';
require '../control/dbControl/UserControl.php';
$userCont = new userControl();

if (isset($_SESSION['qazmkoAdmin']) && ($userCont->userIsALive($_SESSION['qazmkoAdmin']))) {

    if (mysqli_connect_errno()) {
        die();
    } else {
        $data = 'Connected... ' . '<br>';
        $title = "Add user data";
        $tool = new adminDbControl();
        if (isset($_POST['Add'])) {
            $info = checkSpellingAndReturnNewInfo($_POST, $title);

            if ($info != null) {
                if ($tool->writeInto($info, $_POST['perm'])) {
                    $data = "Data has been saved success";
                } else {
                    $data = "email duplicated ";
                    $title = "not Success !!";
                }

            }

        } else if (isset($_POST["search_button"])) {

            if ($_POST["search"] != "!!!") {
                $tool->readFrom();
                $data = $tool->displayEmployeeInformationByName($_POST['search']);

            } else {
                $title = "Search Engine";
                $data = '!!!';

            }

        } else if (isset($_POST["getDatabase"])) {
            $title = "All Data";
            $tool->readFrom();
            $data = $tool->displayEmployeeInformation();

        } else if (isset($_POST["deleteFromDatabase"])) {
            $tool->deleteFrom($_POST['email']);

        }
    }
} else {
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Companies !</title>
    <link rel="stylesheet" href="AdminPageStyleSheet.css">
</head>
<body>

<h1><?php echo $title ?> </h1>

<div class="flexBox">

    <div class="labelFields">
        <ul>
            <li>Name:</li>
            <li>Address:</li>
            <li>Phone:</li>
            <li>Email:</li>
            <li></li>
            <li><h3>Search E.</h3></li>
            <li><h4>C. Name</h4></li>
        </ul>
    </div>

    <div class="inputFields">

        <form action="adminPage.php?name=<?php echo $title ?>" method="post">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <ul>
                <li>
                    <input type="text" name="name" onfocus="this.value =''" value="Ziad Sarrih">
                </li>
                <li>
                    <input type="text" name="address" onfocus="this.value =''" value="Country Town Street 345">
                </li>
                <li>
                    <input type="text" name="phone" onfocus="this.value =''" value="+375444722956">
                </li>
                <li>
                    <input type="text" name="email" onfocus="this.value =''" value="zio@info.com">
                </li>
                <li>
                    <input type="submit" name="Add" value="Add">
                </li>
                <li>
                    <form action="adminPage.php?name=<?php echo $title ?>" method="post">
                        <input type="submit" name="deleteFromDatabase" value="Delete">
                    </form>
                </li>
                <li>
                    <form action="adminPage.php?name=<?php echo $title ?>" method="post">
                        <input type="submit" name="getDatabase" value="GetDataBase">
                    </form>
                </li>
                <li>
                    <form action="adminPage.php?name=<?php echo $title ?>" method="post">
                        <ul class="secondUl ">
                            <li>
                                <input class="search_input" type="text" name="search" onfocus="this.value =''"
                                       value="!!!">
                            </li>
                            <li>
                                <input type="submit" name="search_button" value="Search">
                            </li>
                        </ul>
                    </form>
                </li>

                <li>
                    <div>
                        permission : <br>
                        admin <input type="checkbox" class="check" name="perm" value="100" checked>
                        <br>
                        user <input type="checkbox" class="check" name="perm" value="101">
                        <script>
                            $(document).ready(function () {
                                $('.check').click(function () {
                                    $('.check').not(this).prop('checked', false);
                                });
                            });
                        </script>
                    </div>
                </li>
            </ul>
        </form>
    </div>
    <div class="textAreaBlock">
        <div id="product_list" class="textArea" contenteditable="true"><br>
            <?php echo $data;
            ?>
        </div>
        <div><br/>
            <form action="adminPage.php?name=<?php echo $title ?>" method="post">
                <input type="submit" name="saveData" value="Clear"/>
            </form>
        </div>
    </div>

</div>

<div><br/>
    <form action="adminNavigator.php?name=<?php echo $title ?>" method="post">
        <input type="submit" name="back" value="Admin Panel"/>
    </form>
</div>

</body>
</html>

