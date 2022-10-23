<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>



<style>
p.normal {
  font-weight: normal;
}

p.light {
  font-weight: lighter;
}
p.normal {
  font-weight: normal;
}

p.light {
  font-weight: lighter;
}

p.thick {
  font-weight: bold;
}
p.normal {
  font-weight: normal;
}
</style>
<style>
  
body {
  color: black;
}

p {
  color: black;
}

</style>
<head>
<style>
.center{
  text-align:center;
    
    border: 3px solid #73AD21;
   
  }
</style>
</head>



  


<body>
  

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


    if (mysqli_num_rows($result) == 1) {

      $_SESSION['customer'] = 'true';
      header("location:welcomepage.php");
    } else {
      echo "invalid username or password";
    }
  }
  ?>
   <style>
    mark{
      background-color: white;
      color: maroon;
    }
    </style>

  
  <body>
    <div class="loginbox">
      <img src="pictures/image4.jpeg" class="image">
  


  
    <form class="form-inline" action="managerlogin.php" method="post">
    <label for="manager"><body><p style="font-size:20px">Manager Login:</p></body></label>
      <label for="Name"><body><p style="font-size:20px">Name:</p></body></label>
      <input type="Name" class="form-control" placeholder="Enter Name" id="Name" autocomplete="off" name="name">
      <br>
      <label for="pwd"><p style="font-size:20px">Password:</p></label>
      <input type="texts" class="form-control" placeholder="Enter password" id="pwd" name="password" autocomplete="off">
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox"><p style="font-size:20px"> Remember me</p>
        </label>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</body>
<head>
<style>
body {
  background-color: LIGHTPINK;
}
</style>
</head>
<body>


</body>
<head>
<style>
 
body {
  font-size: 45px;
}
</style>
</head>
<body>


</body>


  <style>
 
body{
    margin: 0;
    padding: 0;
    background: url("pictures/image8.jpeg");
    background-size: cover;
    background-position: center;
    font-family:sans-serif;
}
.loginbox{
  width: 420px;
  background-color: #FFFFFF;
  
  padding: 100px 30px;
  margin: 50px;
  height: 300px;
  font-size:15px;
 background: #000000;
  color: #000000;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
   
}

.image{
  width: 100px;
  height: 100px;
  border-radius:100%;
  position: absolute;
  top: -50px;
  left: calc(50% - 50px);
}
  </style>
  
   
  

</html>