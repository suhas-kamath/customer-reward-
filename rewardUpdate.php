<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "customer";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");
    $reward = $_POST['reward'];
    session_start();
    $cust = $_SESSION['customer_id'];
    $Query = "UPDATE `rewards` SET `points`='$reward' WHERE Customer_id='$cust'";
    $Result = mysqli_query($conn, $Query);
    if ($Result) {
        echo "1";
    } else {
        echo "0";
    }

    ?>