<?php 
session_start();
$roomname = $_SESSION['roomname'];

include("dbcon.php");

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$sql = "INSERT INTO `msg` ( `msg`, `room`, `ip`, `stime`) VALUES ( '$msg ', '$roomname', '$ip', current_timestamp());";
$result = $conn->query($sql);

if($result == false){
    echo "<script> alert('tyytPOST'); </script>";
}


?>