<?php 
$to = "";
$sub = "hello";
$body = "this is me";
$headers = "From:";

if(mail($to,$sub,$body,$headers)){
    echo "suxecss";
}else{
    echo "wrong";
}

?>
