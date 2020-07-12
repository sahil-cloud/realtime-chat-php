<?php 
$to = "idhrudhr.carrental@gmail.com";
$sub = "hello";
$body = "this is me";
$headers = "From: sahiljasuja666@gmail.com";

if(mail($to,$sub,$body,$headers)){
    echo "suxecss";
}else{
    echo "wrong";
}

?>