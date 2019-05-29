<?php

require_once("../gettext/lib/streams.php");
require_once("../gettext/lib/gettext.php");

$local_lang = $_COOKIE['lang'];
$local_file = new FileReader("../gettext/local/$local_lang/LC_MESSAGES/messages.mo");
$local_fetch = new gettext_reader($local_file);


function __($text)
{
    global $local_fetch;
    return $local_fetch->translate($text);
}
