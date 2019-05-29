
<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-29
 * Time: 00:56
 */


require_once __DIR__ . '/gettext/lib/gettext.php';
require_once __DIR__ . '/gettext/lib/streams.php';

$local_lang = $_GET['lang'];
$local_file = new FileReader("local/$local_lang/LC_MESSAGES/messages.mo");
$local_fetch = new gettext_reader($local_file);

function __($text)
{
    global $local_fetch;
    return $local_fetch->translate($text);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Trading And Travel</title>
    <title>Trading And Travel</title>
    <meta name="description" content="trading and travel , import export ,sell , buy ">
    <meta name="keywords" content="trading and travel , import export ,sell , buy ,hotels,flights
,travelocity,airline tickets,vacation,trip,plane tickets,travel agency,airlines,cheap airline tickets,
airfare,fare,cheap airfare,destination,one travel,package,vacation packages,cheap plane tickets,
www expedia com,travel channel,cheap airlines,travel news,budget travel,last minute travel,travel sites,
booking">
    <meta name="robots" content="index, follow">
    <meta name="copyright" content="zi">
    <meta name="language" content="EN">
    <meta name="generator" content="FreeMetaTagGenerator.com">



    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="(max-width:320px)" href="sheet_0_320.css">
    <link rel="stylesheet" media="(min-width:321px) and (max-width:640px)" href="sheet_320_640.css">
    <link rel="stylesheet" media="(min-width:641px) and (max-width:980px)" href="sheet_640_980.css">
    <link rel="stylesheet" media="(min-width:981px)" href="sheet_980_1024.css">
    <link rel="stylesheet" media="(max-width:640px)" href="menu_hidden.css">
    <link rel="stylesheet" media="(min-width:641px)" href="menu.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<h1><?php echo __('translate me') ?></h1>

<nav class=" mainNav">
    <span>Navigation</span>
    <div class="menu-wrapper">
        <i class="fas fa-bars"></i>
        <ul CLASS="mainListItems">
            <li>
                <a href="userLogin/login.php"><img class="firstChildMainListItems" src="mainSources/logo.png"></a>
            </li>
            <li>
                <?php $nameOfThePage = "MSRTrading&Travel" ?>
                <a href="index.php?id=1&name=<?php echo urlencode($nameOfThePage) ?>">HOME</a>
            </li>
            <li><?php $nameOfThePage = "newsPage" ?>
                <a href="index.php?id=1&name=<?php echo $nameOfThePage ?>">NEWS</a>
            </li>
            <li><?php $nameOfThePage = "products" ?>
                <a href="index.php?id=1&name=<?php echo $nameOfThePage ?>">PRODUCTS</a>
            </li>
            <li><?php $nameOfThePage = "servicesPage" ?>
                <a href="index.php?id=1&name=<?php echo $nameOfThePage ?>">SERVICES</a>
            </li>
            <li><?php $nameOfThePage = "contact" ?>
                <a href="contact/contact.php?id=1&name=<?php echo $nameOfThePage ?>">CONTACTS</a>
            </li>

        </ul>
    </div>
</nav>
<a href="http://msrtrading.co/" class="banner">

    <img class="mySlides" src="mainSources/1.jpg">
    <img class="mySlides" src="mainSources/2.jpg">
    <img class="mySlides" src="mainSources/3.jpg">
    <img class="mySlides" src="mainSources/4.jpg">
    <img class="mySlides" src="mainSources/5.jpg">
    <img class="mySlides" src="mainSources/6.jpg">
    <img class="mySlides" src="mainSources/7.jpg">
    <img class="mySlides" src="mainSources/8.jpg">
    <script src="registrationTem/myscripts.js"></script>
    <span class="banner-content">
                <span class="banner-info"><br>
                    All new. For a better you
                </span>
                <span class="bannerLink">
                    www.msrtrading.co
                </span>
            </span>
</a>
<div class="text-box">
    <div class="text-box-content">
        <article>
            Go for new performance
        </article>
    </div>
    <a href="index.php" class="text-box-link">
        <i class="fas fa-angle-right"></i>
    </a>
</div>
<div class="galery">
    <img src="mainSources/f1.jpg" class="galery-link galery-item">
    <img src="mainSources/f2.jpg" class="galery-item">
    <img src="mainSources/f3.jpg" class="galery-item">
    <div class="galery-breaker">
    </div>
</div>
<main>
    <a href="http://msrtrading.co/" class="title-link">www.msrtrading.co</a>
    <article class="text">
        After World War II, Ruska resumed work at Siemens, where he continued to develop the electron microscope,
        producing the first microscope with 100k magnification.[12] The fundamental structure of this microscope design,
        with multi-stage beam preparation optics, is still used in modern microscopes. The worldwide electron microscopy
        community advanced with electron microscopes being manufactured in Manchester UK, the USA (RCA), Germany
        (Siemens)
        and Japan (JEOL). The first international conference in electron microscopy was in Delft in 1949, with more than
        one hundred attendees.[11] Later conferences included the "First" international conference in Paris, 1950 and
        then in London in 1954.
    </article>
    <article class="text">
        After World War II, Ruska resumed work at Siemens, where he continued to develop the electron microscope,
        producing the first microscope with 100k magnification.[12] The fundamental structure of this microscope design,
        with multi-stage beam preparation optics, is still used in modern microscopes. The worldwide electron microscopy
        community advanced with electron microscopes being manufactured in Manchester UK, the USA (RCA), Germany
        (Siemens)
        and Japan (JEOL). The first international conference in electron microscopy was in Delft in 1949, with more than
        one hundred attendees.[11] Later conferences included the "First" international conference in Paris, 1950 and
        then in London in 1954.
    </article>
    <article class="text">
        After World War II, Ruska resumed work at Siemens, where he continued to develop the electron microscope,
        producing the first microscope with 100k magnification.[12] The fundamental structure of this microscope design,
        with multi-stage beam preparation optics, is still used in modern microscopes. The worldwide electron microscopy
        community advanced with electron microscopes being manufactured in Manchester UK, the USA (RCA), Germany
        (Siemens)
        and Japan (JEOL). The first international conference in electron microscopy was in Delft in 1949, with more than
        one hundred attendees.[11] Later conferences included the "First" international conference in Paris, 1950 and
        then in London in 1954.
    </article>
    <article class="text">
        After World War II, Ruska resumed work at Siemens, where he continued to develop the electron microscope,
        producing the first microscope with 100k magnification.[12] The fundamental structure of this microscope design,
        with multi-stage beam preparation optics, is still used in modern microscopes. The worldwide electron microscopy
        community advanced with electron microscopes being manufactured in Manchester UK, the USA (RCA), Germany
        (Siemens)
        and Japan (JEOL). The first international conference in electron microscopy was in Delft in 1949, with more than
        one hundred attendees.[11] Later conferences included the "First" international conference in Paris, 1950 and
        then in London in 1954.
    </article>
</main>


<div class="lang1">
    <div class="dropdown2">
        <form id="contact-form" method="post" action="index.php">
            <input style="margin-left: 90%" name="myPage" type="submit" class="form-control submit" value="Ru">
        </form>
    </div>
</div>

</body>
</html>
