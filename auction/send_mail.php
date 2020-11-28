<?php

  function send_email_update($bider, $price)
  {
    $name = "UCL AUCTION WRBSITE"; //sender’s name
        #$email = $_SESSION['username'] ; //sender’s e-mail address
        $email = "mailexper20@gmail.com"; //sender’s e-mail address
        $recipient = $bider; //recipient
        #$recipient = "Jade.Wang729@gmail.com"; //recipient 
        include ("database.php");
        $query = "SELECT firstName FROM buyer WHERE email = '$bider' ";
        $result = mysqli_query($GLOBALS['connection'],$query) or die('result.' . mysql_error());
        $row = mysqli_fetch_row ($result);

        $mail_body= "Dear". $row[0] .",\r
        \tWe are sorry to inform you that you are out bid. \r
        \tThe price is £".$price." now. "; //mail body
        $subject = "AUCTION SITUATION UPDATE"; //subject
        $header = "From: ". $name . " <" . $email . ">\r\n";
        #$header = "From: ". $name .">\r\n";
        //optional headerfields
        echo($recipient);
        if(mail($recipient, $subject, $mail_body, $header))
        {
            return true;
        }
        else
        {
            return false;
        } //mail function

  }

?>
