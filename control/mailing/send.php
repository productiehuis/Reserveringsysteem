<?php
function sendMail(string $adres, string $message, string $subject)
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: compagnie@kw1c.nl\r\n";

    if (!empty(mail($adres, $subject, $message, $headers)))
    {
        return true;
    }
    else
    {
        echo false;
    }
}
