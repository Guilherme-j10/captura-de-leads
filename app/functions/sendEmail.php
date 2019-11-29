<?php

    // FUNÇÃO QUE DISPARA O EMAIL
    function email(){
        if(isset($_POST["sand"])){
            $email = addslashes($_POST["email"]);

            $from = new SendGrid\Email("your name", "yourEmail@gmail.com");
            $subject = "Subject";
            $to = new SendGrid\Email(null, $email);
            $content = new SendGrid\Content("text/html", 
                "<strong>text</strong>"
            );
            $mail = new SendGrid\Mail($from, $subject, $to, $content);

            $apiKey = 'your API here !!';
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);
            
            if($response){
                echo "<script> alert('Mensagem enviada'); location.href = 'index.php'; </script>";
            }else{
                echo "<script> alert('Não foi possivel enviar a mensagem'); location.href = 'index.php'; </script>";
            }
        }
    }
