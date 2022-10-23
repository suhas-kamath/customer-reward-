<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <style>
        .submit-container {
            display: flex;
            justify-content: space-between;
        }

        #total-price {
            font-weight: 700;
        }

        .Reward-container {
            font-weight: 700;
            text-align: center;
        }
       
        .next {
            text-align: right;
        }
      /*  .container{
        background:#fff;
      border-radius:60px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      padding:80px;
      /*height:500px;*/
    body{
      background:url('pictures/m1.jpeg') no-repeat;
      background-size:cover;
      height:100vh;
      font-family:verdana;
      position:relative;
    }
    .table-bordered
   {
                    border-collapse: collapse;
    margin: 25px 0;
    font-size:1.3em;
    min-width:400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: -1px 12px 12px -6px rgba(0,0,0,0.5);
   }
   .table-bordered thead tr {
       background-color:#009879;
       color: white;
       text-align:center;
       font-weight:bold;
   }
   .table-bordered th,
   .table-bordered td{
       padding:12px 15px;
       border:-5px solid #009879;
       text-align:center;
   }
   .table-bordered tbody tr/*:nth-of-type(even) */{
       background-color: #F7FFDC;
   }
   .table-bordered tbody tr:hover{
       background-color:#BDFFA4;
       
   }
   .table-bordered tbody tr:last-of-type{
       border-bottom: 2px solid #009879;
   }

   .table-bordered tbody tr.active-row{
       font-weight: bold;
       color: #009879;
   }
   .submit-container{
    background:#fff;
    /* border-radius:20px;*/
      position:absolute;
      top:95%;
      left:50%;
      transform:translate(-50%,-50%);
      padding:10px;
      width:58%;
      /*height:500px;*/
    
   }
   .price-container{
    font-weight: bold;  
   }
 .ssb{
    background: darkgreen;
    padding: 1.0px;
    border: none;
    color: white;
    border-radius: 5px;
    font-size:1rem;
 
 }

.hey{
    font-weight: normal;
       color: white;
       text-align:center;
      border-radius:60px;
       padding:10px;
       background-color:#079b7c3b;
       
       width:500px;
      


}
h2{
    color: #1d391f;
    font-weight: bolder;
}
    </style>
</head>



 

<body>
    <div class="container">
        <div class="table-responsive">


            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Product id</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <div class="hey">
                <?php



                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "customer";
                $conn = mysqli_connect($host, $user, $pass, $db) or die("connection failed");

                // $date = $_POST['Last_purchase_date'];


                session_start();
                $phonenumber1 = $_SESSION['phone_number'];
                $query1 = "select customer_id from customer where phone_number='$phonenumber1' ";
                $result1 = mysqli_query($conn, $query1);
                $cust_id = mysqli_fetch_assoc($result1);
                $cust_id1 = $cust_id['customer_id'];
                $_SESSION['customer_id'] = $cust_id['customer_id'];
               
                echo  "<p>THE CUSTOMER ID IS : " . $cust_id1 . "</p>";
             
            
                $query2 = "select points from `rewards` where Customer_id ='$cust_id1'";
                $result2 = mysqli_query($conn, $query2);
                $points = mysqli_fetch_assoc($result2);
                echo  "<p>THE EXISTING REWARD POINTS IS : " . $points['points'] . "</p> ";

                $_SESSION['points'] = $points['points'];

                $_SESSION['customer_id'] = $cust_id['customer_id'];
                ?>
                
                <html><label>
                    <p>Date</p>
                </label>
                <input type="date" placeholder="Date" name="last_purchase_date" id="date" required autocomplete="off">
</div>
                </html>
                <?php
                echo "<h2>Products</h2>";
                $query = "select * from `product` ;";
                $result = mysqli_query($conn, $query);
                //  DATE INSERTION



                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr class='table-row'>
                            <td>" . $row['Name'] . "</td>
                            <td class='price'>" . $row['Price'] . "</td>
                             <td>" . $row['Product_id'] . "</td>
                             <td>
                             <input id=demoInput type=number min=0 max=50 class='quantity'>
                             
                             </script>
                             </td>
                             <td class='total'></td>
                            </tr>";
                }

                ?>

            </table>
            <div class="submit-container">
                <button onclick="fetchPrice()"class="ssb">Submit</button>
                <div class="Reward-container"> 
                    THE REWARD POINT GAINED BY THE CUSTOMER IS :
                    <span id="reward">0</span>
                </div>

                <div class="price-container">
                    Total Price:
                    <span id="total-price">0</span>
                </div>
                <!-- <div class="p-container">
                    Total Price1:
                    <span id="totalreward">0</span>
                </div> -->

            </div>
        </div>
    </div>
</body>


<form action="payment.php">
    <p class="next"><button type="nextpage" name="next" id="button" class="btn btn-success">Next PAGE</button>
    </p>
</form>
<script>
    var total_price = 0;

    function fetchPrice() {
        var reward = 0;
        var tableRow = document.querySelectorAll('.table-row');
        for (i = 0; i < tableRow.length; i++) {
            var item_total = parseInt(tableRow[i].children[3].children[0].value) * parseInt(tableRow[i].children[1].innerText);
            total_price += item_total;
            document.getElementsByClassName('total')[i].innerText = item_total;

        }
        document.getElementById('total-price').innerText = total_price;
        if (total_price > 1000) {
            reward = 0.1 * total_price;
        } else if (total_price > 500) {
            reward = .05 * total_price;
        } else if (total_price <= 500) {
            reward = .025 * total_price;
        }
        document.getElementById('reward').innerText = reward;

        // var existreward = <?php print($points['points']) ?>;
        // var totalreward = existreward + reward;
        // document.getElementById('totalreward').innerText = totalreward;


        sessionStorage.setItem('total-price', total_price)
        sessionStorage.setItem('reward', reward)
    }
</script>

<!-- // $_SESSION['total_price'] = $total_price; -->

</html>