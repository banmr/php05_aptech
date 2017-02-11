<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xu l� gi� tr? t?n t?i, x? l� form
    $errors = array();
    
    // ch?ng spam cho contact
    // array_map: Tr? v? m?t m?ng ch?a t?t c? ph?n t? c?a m?ng $_POST sau khi d� �p d?ng h�m clearemail t?i m?i ph?n t? d�.
    $clean = array_map('clearemail', $_POST);

    if(empty($clean['name'])){
        $errors[] = 'errors name';
    }
    
    if(!preg_match('/^[\w.-]+@[\w.-]+\.+[a-zA-Z]{2,6}$/', $clean['email'])){
        $errors[] = 'errors email';
    }
    
    if(empty($clean['message'])){
        $errors[] = 'errors message';
    }
    
    
    
    if(empty($errors)){
        $to         = "huynhvanban.08i2@gmail.com";
        $subject    = 'contact form Travel Web';
        $header     = "huynhvanban.08i2@gmail.com";
        $body = "Name: {$clean['name']} \n\n Message: \n " . escape_strip_tags($dbc, $clean['message']);
        $body = wordwrap($body, 70);

        $mail_contact = mail($to, $subject, $body, $header);
        if($mail_contact){
            $messages = "<div class='alert alert-success'><strong>Well done!</strong> Thank you for contacting me. i will get back to you ASAP.</div>";
        } else {
            $messages = "<div class='alert alert-error'><strong>Error!</strong> Sorry, your email cound not be sent.</div>";
        }

        var_dump($mail_contact);
    } else {
        $messages = "<div class='alert alert-error'><strong>Error!</strong> please fill all the required fields.</div>";
    }
}

//load view
require('frontend/views/contact/index.php');
?>