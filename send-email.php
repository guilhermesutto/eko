<?php

    if(!empty($_POST['semanas'])){
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
       // $headers .= "From: eko@ekolunteers.com\r\n"; // remetente
       // $headers .= "Return-Path: eko@ekolunteers.com\r\n"; // return-path

        $body = "Foi feita uma solicitação de inscrição pelo site, segue as informações desse voluntário: \n\n ";
        foreach($_POST as $key=>$value){
            $body .= ucwords($key)." : ".$value." \n "; 
        }


        $envio = mail("guilhermesutto91@gmail.com", "Inscrição Feita pelo site", $body, $headers);
        //$envio = mail("gabriella@ekolunteers.com", "Inscrição Feita pelo site", $body, $headers);
        
        if($envio)
        echo "Mensagem enviada com sucesso";
        else
        echo "A mensagem não pode ser enviada";

    }