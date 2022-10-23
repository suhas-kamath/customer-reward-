<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
.exists {
  font-weight: bold;
    border-radius: 60px;
    position: absolute;
    top: 64%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
    font-size: 20px;
    }


body{
      background:url('pictures/m1.jpeg') no-repeat;
     background-size:110%;
      /*height:100vh;
      width:5000;
      background-position:center;
      font-family:verdana;
      position:relative;*/
    }
    .form-inline{
      background:white;
      border-radius:50px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      padding:40px;
      border-color:pink;
      border-style:ridge;
      border-width:9px;
      /*height:500px;*/
    }
    /*body::before{
      content:'';
      display:block;
      position:fixed;
      left:0;
      top:0;
      height:100vh;
      width:100vw;
      background:rgba(0,0,0,0.7);
    }*/
    h1{
      color:black;
    }
     
   .btn-success{
    /*width: 100%;
    margin-top: 20px;*/
    background: royalblue;
    padding: 1.0px;
    border: none;
    color: white;
    border-radius: 5px;
    font-size:1rem;
    transition:0.5s;
    position: relative;
    left:8%;  
   }
   .btn-success:hover{
    transform:scale(1.2);
}


  </style>

<body>
  <?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "customer";
  $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");
  if (isset($_POST['phone_number'])) {

    $phonenumber = $_POST["phone_number"];
    $query = "select * from customer where phone_number ='$phonenumber'";
    $result = mysqli_query($conn, $query);



    if (mysqli_num_rows($result) == 1) {
      session_start();
      $_SESSION['phone_number'] = $_POST['phone_number'];
      $phonenumber1 = $_SESSION['phone_number'];
      echo $phonenumber1;
      header("location:home.php");
    } else {
      echo "<h4 class='exists'>The phone number is not registered, please enter the correct phone number</h4>";
    }
  }


  ?>

  <form class="form-inline" action="login.php" method="POST">
    <h1>Enter Phone Number to verify the Customer</h1>
    <label for="phone"><b>Phone</b></label>
    <input type="text" name="phone_number" class="phone" value="+91" size="12" autocomplete="off" />
    <br><br>
    <button type="submit" name="submit" class="btn-success">Submit</button>
  </form>
</body>

</html>