<?php

ini_set('SMTP','myserver');
ini_set('smtp_port',25);
$to      = 'be22s06f007@geca.ac.in';
$subject = 'the subject';
$message = 'hello';
$headers = 'From:(rrpatle@ruchagroup.com'       . "\r\n" .
             'Reply-To:rrpatle@ruchagroup.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
{
    echo "Email sent!";
}
else
{
    echo "Error";
}












//sendMail();
function sendMail()
{

    $to = 'sujitpmagar5566@geca.ac.in';
    // $firstname = $_POST["fname"];
    // $email= $_POST["email"];
    // $text= $_POST["message"];
    // $phone= $_POST["phone"];
    $firstname ="Amey";
    $laststname="kulkarni";
    $email= "be22s06f007@geca.ac.in";
    $text= "this is test";
    $phone= "12345676543";
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$phone.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }




}





?>
