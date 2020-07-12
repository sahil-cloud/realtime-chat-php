<?php
session_start();
$roomname = $_GET['roomname'];
$_SESSION['roomname'] = $roomname;
// echo $roomname;

include('dbcon.php');

//existence of room
$sql = "SELECT * FROM rooms where roomname = '$roomname'";
$result = $conn->query($sql);
// $rr = $result->fetch_assoc();
// var_dump($rr);

if ($result->num_rows == 0) {
    echo "<script>alert('room does not exist')</script>";
    // echo "<script>location.href='index.php';</script>";
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/talewind.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <style>
            body {
                margin: 0 auto;
                max-width: 800px;
                padding: 0 20px;
            }

            .container {
                border: 2px solid #dedede;
                background-color: #f1f1f1;
                border-radius: 5px;
                padding: 10px;
                margin: 10px 0;
            }

            .darker {
                border-color: #ccc;
                background-color: #ddd;
            }

            .container::after {
                content: "";
                clear: both;
                display: table;
            }

            .container img {
                float: left;
                max-width: 60px;
                width: 100%;
                margin-right: 20px;
                border-radius: 50%;
            }

            .container img.right {
                float: right;
                margin-left: 20px;
                margin-right: 0;
            }

            .time-right {
                float: right;
                color: #aaa;
            }

            .time-left {
                float: left;
                color: #999;
            }

            .anyclass {
                height: 400px;
                overflow-y: scroll;
            }
        </style>

        <!-- <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style.css"> -->
        <!-- <link rel="stylesheet" href="css/home.css"> -->
    </head>

    <body>

        <h2>Chat Messages- <?php echo $roomname; ?></h2>

        <!-- <div class="container"> -->
        <div class="container">
            <div class="anyclass">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;"> -->
                        <!-- <p>Hello. How are you today?</p>
                <span class="time-right">11:00</span> -->
                        <?php
                        $sql12 = "SELECT * from msg where room = '$roomname'";
                        $result12 = $conn->query($sql12);
                        while ($row1 = $result12->fetch_assoc()) {
                            // var_dump($row1);
                        ?>
                            <div class="container">
                                <p><?php echo $row1['msg']; ?></p>
                                <small><?php echo $row1['ip']; ?></small>
                                <span class="time-right"><?php echo $row1['stime']; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <form method="POST">

                    <input type="text" name="usermsg" id="usermsg" class="form-control mb-2" placeholder="Add message">
                    <button class="btn btn-info" style="float: right;" name="submitmsg" id="submitmsg">send</button>
                </form>

            </div>
        </div>

        <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
        <script src="bootstrap/js/jquery.vide.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $("#submitmsg").click(function(e) {
                // e.preventDefault();
                var clientmsg = $("#usermsg").val();
                $.post("postmsg.php", {
                        text: clientmsg,
                        room: '<?php echo $roomname; ?>',
                        ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'
                    },
                    function(data, status) {
                        document.getElementsByClassName('anyclass')[0].innerHTML = data;
                    }
                );
                // return false;

            });
        </script>
    </body>

    </html>

<?php
}
// if (isset($_REQUEST['submitmsg'])) {
//     if ($_REQUEST['usermsg'] == "") {
//         echo "aadd";
//     } else {

//         $msg = $_REQUEST['usermsg'];
//         // $room = $roomname;
//         $ip = $_SERVER['REMOTE_ADDR'];

//         $sql = "INSERT INTO `msg` ( `msg`, `room`, `ip`, `stime`) VALUES ( '$msg ', '$roomname', '$ip', current_timestamp());";
//         $result = $conn->query($sql);

//         if ($result == false) {
//             echo "<script> alert('tyytPOST'); </script>";
//         }
//     }
// }

?>