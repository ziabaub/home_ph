<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-02-28
 * Time: 00:30
 */

if (isset($_GET['res']))
    $error = $_GET['res'];
else
    $error = "";
include_once ('../gettext/langTools.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo __('Responsive page') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content=" idea , computers , money ...">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" media="(max-width:320px)" href="../sheet_0_320.css">
    <link rel="stylesheet" media="(min-width:321px) and (max-width:640px)" href="../sheet_320_640.css">
    <link rel="stylesheet" media="(min-width:641px) and (max-width:980px)" href="../sheet_640_980.css">
    <link rel="stylesheet" media="(min-width:981px)" href="../sheet_980_1024.css">
    <link rel="stylesheet" media="(max-width:640px)" href="../menu_hidden.css">
    <link rel="stylesheet" media="(min-width:641px)" href="../menu.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div>
    <nav class=" mainNav">
        <span>Navigation</span>
        <div class="menu-wrapper">
            <i class="fas fa-bars"></i>
            <ul CLASS="mainListItems">
                <li>
                    <a href="../userLogin/login.php"><img class="firstChildMainListItems" src="../mainSources/logo.png"></a>
                </li>
                <li>
                    <?php $nameOfThePage = "MSRTrading&Travel" ?>
                    <a href="../index.php?id=1&name=<?php echo urlencode($nameOfThePage) ?>"><?php echo __('HOME') ?></a>
                </li>
                <li><?php $nameOfThePage = "newsPage" ?>
                    <a href="../index.php?id=1&name=<?php echo $nameOfThePage ?>"><?php echo __('NEWS') ?></a>
                </li>
                <li><?php $nameOfThePage = "products" ?>
                    <a href="../index.php?id=1&name=<?php echo $nameOfThePage ?>"><?php echo __('PRODUCTS') ?></a>
                </li>
                <li><?php $nameOfThePage = "servicesPage" ?>
                    <a href="../index.php?id=1&name=<?php echo $nameOfThePage ?>"><?php echo __('SERVICES') ?></a>
                </li>
                <li><?php $nameOfThePage = "contact" ?>
                    <a href="contact.php?id=1&name=<?php echo $nameOfThePage ?>"><?php echo __('CONTACTS') ?></a>
                </li>

            </ul>
        </div>
    </nav>
</div>
<div>

    <div class="flex-container">
        <div class="flex-container-address-content">
            <h2><?php echo __('Get In Touch') ?> </h2><br/>
            <p> <?php echo __('Address : Beirut facing Chamsine Bakery') ?></p><br/>
            <p> <?php echo __('Email : msr.trading.travel.co@gmail.com') ?></p><br/>
            <p> <?php echo __('Phone : +961 76 743 330') ?></p>
        </div>
        <div>
            <div class="flex-container-contents">

                <ul style="list-style-type: none">
                    <li>
                        <?php echo __('name :') ?>
                        <br/></li>
                    <li>
                        <?php echo __('address :') ?>
                        <br/></li>
                    <li>
                        <?php echo __('phone :') ?>
                        <br/></li>
                    <li>
                        <?php echo __('email :') ?>
                        <br/></li>
                    <li>
                        <?php echo __('message :') ?>
                        <br/></li>
                    <li>


                    </li>

                </ul>

            </div>
        </div>
        <div>
            <form action="contactFormHandler.php" method="post">

                <ul class="flex-container-contents-textarea" style="list-style-type: none">
                    <li>
                        <input type="text" name="name" class="form-control" placeholder="<?php echo __('Your Name') ?>" required>
                        <br/></li>
                    <li>
                        <input type="text" name="address" class="form-control" placeholder="<?php echo __('Your Address') ?>" required>
                        <br/></li>
                    <li>
                        <input type="text" name="phone" class="form-control" placeholder="+961 70123456" required>
                        <br/></li>
                    <li>
                        <input type="text" name="email" class="form-control" placeholder="<?php echo __('Your Email') ?>" required>
                        <br/></li>
                    <li>
                        <textarea class="form-control" style="resize: none" type="text" name="message"
                                  placeholder="<?php echo __('Message') ?>" rows="5" required></textarea>
                        <br/></li>
                    <div>
                        <input type="submit" name="submit" value="Send !">
                        <label><?php echo $error ?></label>
                    </div>
                </ul>
            </form>
        </div>
    </div>

</div>
<div class="text-box">
    <div class="text-box-content">
        <article>
            <?php echo __('Go for new performance') ?>
        </article>
    </div>
    <a href="../index.php?id=1&home" class="text-box-link">
        <i class="fas fa-angle-right"></i>
    </a>
</div>

<div class="footer">

    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

</div>


</body>
</html>

