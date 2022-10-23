<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "customer";
$conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
       body{
      background:url('pictures/pay5.jpeg') no-repeat;
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
      background:rgba(0,0,0,0.6);
    }
    .selection{
        background-color:thistle;
    
      border-radius:60px;
      position:absolute;
      top:53%;
      left:50%;
      transform:translate(-50%,-50%);
     padding:80px;
   
      /*height:500px;*/
    }
    .heading{
    
      text-align:center;
    }
   .res{     
          font-size:1rem;
   
 font-weight:900;

        position:absolute;
      top:5%;
      left:25%;
      transform:translate(-50%,-50%);}
 
    .point{
        font-size:1rem;
 
      
 font-weight:900;

        position:absolute;
      top:10%;
      left:26%;
      transform:translate(-50%,-50%);
    
    }
    hr{
border:2px solid black;
border-radius:3px;
    }  
 
    
      </style>

<body>


   
   

  
    
    <div class="selection">
        
   <div class="res">THE TOTAL AMOUNT:<span class="price"></span></div>
    <?php
    session_start();
    $Customer_id = $_SESSION['customer_id'];
    
    echo "<h3 class='point'> YOUR EXISTING POINTS :". $_SESSION['points']."</h3>";
    
    ?>
    <hr>
        <div>
            
            <h2 class="heading">Payment</h2>
            <h5><br>DO YOU WISH TO INCLUDE YOUR PREVIOUS REWARD POINT ON YOUR BILL?</br></h5>
        </div>
        <form action="payment.php" method="POST" id='radioform'>
            <input type="radio" name="yes" value="0" class="select" id="YES" />
            <label for="yes">Yes</label>
            <br />
            <input type="radio" name="yes" value="1" class="select1" id="NO" />
            <label for="no">No</label>
            <br />

            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
        <br/>
        <h3><span class="noprice"></span>
        </h3>


        <script>
            document.querySelector('.price').textContent = sessionStorage.getItem('total-price')

            // document.querySelector('.minuspoints').textContent = sessionStorage.getItem('total-price') - sessionStorage.getItem('reward')

            var form = document.getElementById('radioform');
            var no = document.createElement('p');
            var radioButtons = document.querySelectorAll('input[name="yes"]');

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let selectedSize;
                for (const radioButton of radioButtons) {
                    if (radioButton.checked) {
                        selectedSize = radioButton.value;
                        break;
                    }
                }

               console.log(selectedSize);
                var total_price;
                var reward;
                if (selectedSize == '1') {
                    reward = <?php echo $_SESSION['points'] ?> + parseFloat(sessionStorage.getItem('reward'));
                    total_price = (sessionStorage.getItem('total-price'))
                    document.querySelector('.noprice').textContent = total_price;




                } else if (selectedSize == '0') {
                    //yes ge idhu
                    reward = sessionStorage.getItem('reward');
                    total_price = sessionStorage.getItem('total-price') - <?php echo $_SESSION['points'] ?>;
                    document.querySelector('.noprice').textContent = sessionStorage.getItem('total-price') - <?php echo $_SESSION['points'] ?>;


                }
                $.ajax({
                    url: "rewardUpdate.php",
                    method: "POST",
                    data: {
                        reward
                    },
                    success: function(result) {
                        console.log(result)
                        // $("#weather-temp").html("<strong>" + result + "</strong> degrees");
                    }
                });
            })
        </script>
<hr>
        <div class="payment"><h5>PAYMENT METHOD</h5></div>
        <input type="radio" name="money" id="cash" />
        <label for="cash">CASH</label>
        <br />
        <input type="radio" name="money" id="card" />
        <label for="card">CARD</label>
        <br />
        <input type="radio" name="money" id="upi">
        <label for="upi">UPI</label>
        <br />

        <form action="login.php" method="POST">
            <button type="submit" name="payment" class="btn btn-primary">
                Pay
            </button>
        </form>

        <div class="today">
            <p>

            </p>
        </div>

        <div class="todaysreward">

            CUSTOMER'S TODAY'S REWARD POINT IS <span class="reward"></span> <br />CUSTOMER CAN USE THIS REWARD POINT ON YOUR NEXT PURCHASE.....
        </div>
    </div>
</body>
<script>
    document.querySelector('.reward').textContent = sessionStorage.getItem('reward')
</script>

</html>