<?php
$to       = 'jade.wang729@gmail.com';
$subject  = 'Watchlist Upadte';
$message  = 'A mail from Auction House';
$headers  = 'From: UCL Auction_House Database Project <mailexper20@gmail.com>' . PHP_EOL.
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
?>