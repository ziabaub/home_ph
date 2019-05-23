<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-09
 * Time: 12:26
 */

require "../control/textControl/spellingControl.php";
$reg_test = checkSpelling($_POST);
//print_r($_POST);
if ($reg_test == "Success ! ") {
    $visitor_name = $_POST['name'];
    $visitor_address = $_POST['address'];
    $visitor_phone = $_POST['phone'];
    $visitor_email = $_POST['email'];
    $visitor_message = $_POST['message'];

    $email_from = $visitor_email;
    $email_subject = "New Form Submission";
    $email_body = "User Name : $visitor_name.\n" .
        "User Address : $visitor_address.\n" .
        "User Phone : $visitor_phone.\n" .
        "User Email : $visitor_email.\n" .
        "User Message : $visitor_message.\n";

    $to = "ziabaub@gmail.com";
    $headers = "Content-type: text/html; charset=utf-8 \r\n".
        "Form : $email_from  \r\n" .
        "Reply-To : $to \r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        mail("msr.trading.travel.co@gmail.com", $email_subject, $email_body, $headers);
        $email_from = "ziabaub@gmail.com";
        $email_subject = "thank you for contacting us ";
        $email_body = "User Name : $visitor_name.\n" .
            "User Address : $visitor_address.\n" .
            "User Phone : $visitor_phone.\n" .
            "User Email : $visitor_email.\n" .
            "User Message : $visitor_message.\n" .
            "Reply : thank you for contacting us we will reply soon as possible ";
        $headers =  "Content-type: text/html; charset=utf-8 \r\n".
            "Form : $email_from  \r\n" .
            "Reply-To : $visitor_email \r\n";

        mail($visitor_email, $email_subject, $email_body, $headers);
    }
    header("Location: contact.php?id=404&res=$reg_test");

} else {
    header("Location: contact.php?id=404&res=$reg_test");
}



