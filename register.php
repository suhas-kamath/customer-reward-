<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CUSTOMER POINT MANAGMENT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .container{
       
      border-radius:60px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      padding:50px;
      background-color: thistle;
      height:500px;
      width:1200px;
    
    }
    body{
      background:url('pictures/m1.jpeg') no-repeat;
      background-size:cover;
      height:100vh;
      font-family:verdana;
      position:relative;
    }
 body::before{
      content:'';
      display:block;
      position:fixed;
      left:0;
      top:0;
      height:100vh;
      width:100vw;
      background:rgba(0,0,0,0.7);}

      .nav{
        font-size:1.2rem;
    font-weight:bold;
    color: #c5cae9;

        position:absolute;
      top:70%;
      left:50%;
      transform:translate(-50%,-50%);
      text-indent:50px;
      }

p{
    font-size:1.2rem;
    font-weight:bold;   
}
h6{
    font-size:1.2rem;
    font-weight:bold; 
    color:black; 
    left:80%;
    top:80%;
}
.registerbtn{
    color:white;
    background-color:green;
}
.heading{
    text-align:center;
}
.exist {
    font-weight:bold;
      border-radius: 60px;
      position: absolute;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%);
      
      color:#c5cae9;
    }

    </style>
<body>
 


    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "customer";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $Address = $_POST['Address'];
        $phone = $_POST['phone_number']; {
            //input line insert madlike
            $input = "INSERT INTO `customer` (`Name`, `Address`, `phone_number`) VALUES ('$name', '$Address','$phone')";
            $c = mysqli_query($conn, $input);
            if ($c == true) {
                // $query1="get customer id    reward zeroooo"
                $query1 = "SELECT Customer_id FROM `customer` WHERE phone_number='$phone';";
                $result1 = mysqli_query($conn, $query1);
                $result11 = mysqli_fetch_assoc($result1);

                $result111 = $result11['Customer_id'];
                echo $query2 = "INSERT INTO `rewards`( `Customer_id`, `points`) VALUES ('$result111',0);";
                $result2 = mysqli_query($conn, $query2);
                session_start();
                $_SESSION['phone_number'] = $_POST['phone_number'];
                header('location:home.php');
            } 
             else {
                if (mysqli_errno($conn) == 1062) {
                   
    
                    echo "<h4 class='exist'>The Phone number is already registered. Please select login page</h4 >";
                } else {
                    echo "Please Reenter your data  ";
                }
            }
        }
    }



 
    ?>





    <form action="register.php" method="POST">
        <div class="container">
            <h1 class='heading'>Register</h1>
            <hr>
            <p>Please fill in this form to create an account of customer.</p>
            <hr>

            <label><b>Name</b></label>
            <input type="text" placeholder="Name" name="name" id="name" required autocomplete="off">

            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Address" name="Address" id="Address" required autocomplete="off">

            <label for="phone"><b>Phone</b></label>
            <input type="text" name="phone_number" value="+91" size="12" autocomplete="off" />
            <br> <br>

            <hr>
            <button type="submit" class="registerbtn">Register</button>
            <button input type="reset" class="registerbtn">Reset</button>
            <hr>
            <p>Already have an account? <a href="login.php">Log in</a></p>
            
        </div>

     
    </form>



    <nav class="nav">
        <a href="about.html">About us</a>
        
        
</nav>
    </footer>

</html>