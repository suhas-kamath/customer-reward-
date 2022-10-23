<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CUSTOMER POINT MANAGMENT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header container group">
        <h1 class="logo">
            MANAGER SIGN UP FORM
        </h1>

    </header>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "customer";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $s = "select * from manager where name='$name';";
        $result = mysqli_query($conn, $s);

        $num = mysqli_num_rows($result);

        if ($num == 1) {
            echo "USERNAME IS ALREADY TAKEN";
        } else {
            $input = "INSERT INTO `manager` (`Name`, `phone`, `password`) VALUES ('$name', '$phone', '$password')";
            $c = mysqli_query($conn, $input);
            header('location:login.php');
        }
    }
    ?>





    <form action="save.php" method="POST">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label>Name</label>
            <input type="text" placeholder="name" name="name" id="name" required autocomplete="off">

            <label for="psw"><b>Password</b></label>
            <input type="text" placeholder="Enter Password" name="password" id="password" required autocomplete="off">

            <label for="phone"><b>Phone</b></label>
            <input type="text" name="phone" value="+91" size="12" autocomplete="off" />
            <br> <br>

            <hr>
            <button type="submit" class="registerbtn">Register</button>
            <button input type="reset" class="registerbtn">reset</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="managerlogin.html">Sign in</a></p>
        </div>
    </form>


    <small>&copy;Suhas S Kamath AND Shravya Shetty</small>

    <nav class="nav">
        <a href="about.html">About us</a>
        <a href="contact.html">Contact Us</a>
    </nav>
    </footer>

</html>




















////////////////////// buttoonnnnnnnn Creation

<body>
    <input id=demoInput type=number min=0 max=10>
    <button onclick="increment()">+</button>
    <button onclick="decrement()">-</button>
    <script>
        function increment() {
            document.getElementById('demoInput').stepUp();
        }

        function decrement() {
            document.getElementById('demoInput').stepDown();
        }
    </script>
</body>