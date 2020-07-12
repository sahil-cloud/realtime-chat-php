<?php
session_start();
$room = $_REQUEST['room'];

if(strlen($room)>20 or strlen($room)<2){
    echo "<script>alert('please enter size of room between 3 and 20')</script>";
    echo "<script>location.href='index.php';</script>";
    
}

else if(!ctype_alnum($room)) {
    echo "<script>alert('please enter alphanumeric room name')</script>";
    echo "<script>location.href='index.php';</script>";
}
else{
    include('dbcon.php');
    $sql = "SELECT * FROM rooms where roomname = '$room'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
        echo "<script>alert('room already occupied')</script>";
        echo "<script>location.href='index.php';</script>";
    }
    else{
        $sql1 = "INSERT INTO rooms (roomname,stime) VALUES('$room',CURRENT_TIMESTAMP)";
        $result1 = $conn->query($sql1);

        if($result1){
            echo "<script>alert('room claimed')</script>";
            echo "<script>location.href='room.php?roomname=".$room."';</script>";
        }
    }
}

?>