<div class="loginbox">
      <img src="pictures/image9.jpeg" class="image">
  


  
    <form class="form-inline" action="managerlogin.php" method="post">
    <label for="manager"><body><p style="font-size:70px font-family:verdana">Manager Login</p></body></label>
      <label for="Name"><body><p style="font-size:30px">Name:</p></body></label>
      <input type="Name" class="form-control" placeholder="Enter Name" id="Name" autocomplete="off" name="name" >
      <br>
      <label for="pwd"><p style="font-size:30px">Password:</p></label>
      <input type="texts" class="form-control" placeholder="Enter password" id="pwd" name="password" autocomplete="off">
      <div class=" form-group form-check">
      <input class="form-check-input" id="remember" type="checkbox">
        <label class="form-check-label">
          Remember Me
        </label>
       
      </div>
      <button type="submit" name="submit" class="btn btn-success" id="submit" style=" background-color:limegreen">  Submit</button>
    </form>
  </div>




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