<?php
  
    $name = "UCL AUCTION WRBSITE"; //sender’s name
    #$email = $_SESSION['username'] ; //sender’s e-mail address
    $email = "Jade.Wang729@gmail.com"; //sender’s e-mail address
    #$recipient = "Jade.Wang729@gmail.com"; //recipient
    $recipient = "yang.zou@ucl.ac.uk"; //recipient 
    $mail_body= "UCL AUCTION WRBSITE"; //mail body
    $subject = "TEST"; //subject
    $header = "From: ". $name . " <" . $email . ">\r\n";
    #$header = "From: ". $name .">\r\n";
    //optional headerfields
    if(mail($recipient, $subject, $mail_body, $header))
    {
        echo("yes");
    }
    else
    {
        echo("no");
    } //mail function
?>
