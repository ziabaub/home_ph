<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-29
 * Time: 00:56
 */


require_once("lib/streams.php");
require_once ("lib/gettext.php");

$local_lang = $_GET['lang'];
$local_file = new FileReader("local/$local_lang/LC_MESSAGES/messages.mo");
$local_fetch = new gettext_reader($local_file);

function __($text)
{
    global $local_fetch;
    return $local_fetch->translate($text);
}

?>
<<<<<<< HEAD
<h1><?php echo __('translate me') ?></h1>
=======
<!--<h1>--><?php //echo __('translate mse') ?><!--</h1>-->
>>>>>>> pas
<!--<p>--><?php //echo _('hello my friends') ?><!--</p>-->


