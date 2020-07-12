<?php
include('dbcon.php');
    $user ="SELECT * from user_info";
    $result = $conn->query($user);

    while($row = $result->fetch_assoc()){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_profile = $row['user_profile'];
        $login = $row['log_in'];

            echo "
                <li>
                <div class='chat-left-img'>
                <img src='$user_profile'>
                </div>
                <div class='chat-left-details'>
                <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
            
            if($login == "online"){
                echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online</span>";
            }
            else{
            echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";

            }
            "</div>
            </li>
            ";
        }
            
    

?>