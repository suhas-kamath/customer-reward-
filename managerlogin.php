<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Login</title>
  <style>
    body{
      background:url('pictures/m1.jpeg') no-repeat;
      background-size:cover;
      height:100vh;
      font-family:verdana;
      position:relative;
    }
    .login{
      background:#fff;
      border-radius:60px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      padding:80px;
      /*height:500px;*/
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
      
    .user-image-container{
      width:100%;
      height:50px;
      /* background:red; */
      position:absolute;
      top:-30px;
      left:0;

    }
    .user-image{
      width:60px;
      height:60px;
      background:url('pictures/image7.jpeg');
      background-size:cover;
      margin:auto;
      border-radius:50%;
    }
    .heading{
      font-size:1.2rem;
      text-align:center;
    }
    .form-group{
      width:300px;
      display:flex;
      flex-direction:column;
      /* margin-bottom:30px; */
    }
    .form-item{
      padding:8px;
      border:2px solid #938d8d;
      margin-bottom:15px;
      border-radius:5px;
      outline:none;
      transition:0.5s;
    }
    
    .form-item:focus{
      border:2px solid royalblue;
    }
    .form-group label{
      font-size:0.85rem;
      font-weight:500;
      margin-bottom: 10px;
    }

   .form-checkbox-container{
    font-size: 0.75rem;
   }
   
   .submit{
    width: 100%;
    margin-top: 20px;
    background: royalblue;
    padding: 10px;
    border: none;
    color: white;
    border-radius: 5px;
    font-size:1rem;
   }
   .invalid {
      border-radius: 60px;
      position: absolute;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 100px;
    }

  </style>
</head>
<body>
  <div class="login">
    <div class="user-image-container">
      <div class="user-image"></div> 
    </div>
    <h2 class="heading">Manager Login</h2>
    <form action="managerlogin.php" class="login-form" action="managerlogin.php" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="name" id="username" class="form-item" placeholder="Username" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" id="password" name="password" class="form-item" placeholder="Password" autocomplete="off">
        </div>
        <div class="form-checkbox-container">
          <input type="checkbox" name="" id="checkbox">Remember Me
          </div>
        <input type="submit" class="submit" value="Login">
    </form>
  </div>

</body>
</html>


     
  <?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "customer";
  $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");


  if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST["password"];
    $query = "select * from manager where name='$name' and  password='$password'";
    $result = mysqli_query($conn, $query);

{
    if (mysqli_num_rows($result) == 1) {

      $_SESSION['customer'] = 'true';
      header("location:welcomepage.php");
    } else {
      echo   "<h4 class='invalid'>Invalid Username or Password</h4>";
    }
  }}
  ?>