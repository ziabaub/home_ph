<?php
session_start();
require '../control/dbControl/UserControl.php';
$userCont = new userControl();
if (isset($_SESSION['qazmkoAdmin']) && ($userCont->userIsALive($_SESSION['qazmkoAdmin']))) {
    $from = 'adminPanel';
    if (isset($_POST['get'])) {
        $from = "get";
        $id = $_POST['field-article'];
        $data = $userCont->getArticleByName($_POST['field-article']);
    } else {
        $data = Array("name" => '', "contents" => '', "author" => '');
        $id = "";
    }
} else {
    die();
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Page</title>
        <link rel="stylesheet" href="adminPageManagementStylePage.css" type="text/css">
    </head>
    <body>
    <h1>Admin Page</h1>

    <div class="flexBox">
        <div>
            <table class="table-contents">
                <tr>
                    <th>Article id</th>
                    <th>Article name</th>
                    <th>Img</th>
                    <th>Author</th>
                </tr>
                <?php $result = $userCont->getArticle();
                if (isset($result)) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imgName = explode('/', $row['img']);
                        $imgName = explode('.', end($imgName));
                        echo '<tr>' . '<td>' . $count++ . '</td>' .
                            '<td>' . $row['name'] . '</td>' .
                            '<td>' . $imgName[0] . '</td>' .
                            '<td>' . $row['author'] . '</td>' . '<tr>';
                    }
                }
                ?>

            </table>

        </div>

        <div>
            <form action="adminPageManagement.php?name=<?php echo $from ?>&id=<?php echo $id ?>" method="post"
                  enctype="multipart/form-data">
                <div class="MainflexBox">
                    <div>
                        <input name="article-name" type="text" class="textAreaBlock1"
                               value="<?php echo $data['name'] ?>" placeholder="article name" required>
                        <br>
                        <textarea name="article-content" rows="5" class="textAreaBlock" style="resize: none"
                                  placeholder="article-contents"
                                  required><?php echo $data['contents'] ?>"</textarea>
                        <br>
                        <input name="article-author" type="text" class="textAreaBlock1"
                               value="<?php echo $data['author'] ?>" placeholder="author" required>
                        <br>
                    </div>
                    <div class="flexBoxStandart"><br>
                        <input class="buttons-article" type="submit" name="add" value="add"/>
                        <input type="file" name="userFile">
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="flexBox">
        <form action="adminPageManagement.php?name=<?php echo $from ?>&id=<?php echo $id ?>" method="post">
            <input type="submit" name="get" value="get"/>
            <input class="buttons-article" type="submit" name="delete" value="delete"/>
            <textarea class="buttons-article1" name="field-article" style="resize: none" placeholder="article name"
                      required></textarea>
        </form>

    </div>
    <br>
    <div class="flexBox">
        <form action="adminNavigator.php" method="post">
            <input type="submit" name="back" value="Admin Panel"/>
        </form>
        <form action="adminPageManagement.php?name=adminPanel" method="post">
            <input type="submit" name="refresh" value="refresh"/>
        </form>
    </div>
    </body>
    </html>
<?php
//print_r($_POST);
//print_r($_GET);
//print_r($_FILES);
if ((isset($_FILES['userFile'])) && (strcasecmp($_GET['name'], 'adminPanel') == 0)) {
    $userCont->setArticle($_POST['article-name'], $_POST['article-content'], $_POST['article-author'], $_FILES);
} else if ((isset($_POST['add'])) && (strcasecmp($_GET['name'], 'get') == 0)) {
    $userCont->updateArticle($_POST['article-name'], $_POST['article-content'], $_POST['article-author'], $_FILES, $_GET['id']);
} else if (isset($_POST['delete'])) {
    $userCont->deleteArticles($_POST['field-article']);
}
?>