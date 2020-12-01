<?php

  //mail function
  function send_email_update($bider,$bid_name,$price)
  {
    $name = "UCL AUCTION WRBSITE"; //sender’s name
        $email = "mailexper20@gmail.com"; //sender’s e-mail address
        $recipient = $bider; //recipient

        $mail_body= "Dear ". $bid_name .",\r
        \tWe are sorry to inform you that you are outbid. \r
        \tThe price is £".$price." now. "; //mail body
        $subject = "AUCTION SITUATION UPDATE"; //subject
        $header = "From: ". $name . " <" . $email . ">\r\n";
        if(mail($recipient, $subject, $mail_body, $header))
        {
            return true;
        }
        else
        {
            return false;
        }

  }

  function send_email_watch($bider,$bid_name, $price)
  {
    $name = "UCL AUCTION WRBSITE"; //sender’s name
        #$email = $_SESSION['username'] ; //sender’s e-mail address
        $email = "mailexper20@gmail.com"; //sender’s e-mail address
        $recipient = $bider; //recipient

        $mail_body= "Dear ".$bid_name.",\r
        \tWe are here to inform you about the item in your watchlist. \r
        \tThe price is £".$price." now. "; //mail body
        $subject = "AUCTION SITUATION UPDATE"; //subject
        $header = "From: ". $name . " <" . $email . ">\r\n";
        if(mail($recipient, $subject, $mail_body, $header))
        {
            return true;
        }
        else
        {
            return false;
        }

  }

  










?>
