<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>TYPE OF CUSTOMER</title>
</head>

<head>
    <h1><p style="font-size:50px">WELCOME BACK!</p></h1>
</head>
<style>

    body{
      background:url('pictures/m1.jpeg') no-repeat;
      background-size:cover;
      height:100vh;
      font-family:verdana;
      position:relative
    }
  /*  body::before{
      content:'';
      display:block;
      position:fixed;
      left:0;
      top:0;
      height:100vh;
      width:100vw;
      background:rgba(0,0,0,0.7);}*/
    h1{text-align:center;}
    h1{color:yellow;
        
    }

    .btn{
      display: inline-block;
      text-decoration: none;
      font-family: "Times New Roman";
      color: black;
      width: 520px;
      height: 320px;
      line-height: 120px;
      border-radius:50%;
      position:relative;
      left:20%;
      top:150px;
      border-color:royalblue;
      border-style:ridge;
      border-width:5px;
box-shadow:-6px 6px 0 hsl(16, 100%, 30%);
transition:0.5s;
    }
    .btn:hover{
    transform:scale(1.2);
}
.button{
    display: inline-block;
      text-decoration: none;
      font-family: "Times New Roman";
      
      color: black;
      width: 520px;
      height: 320px;
      line-height: 120px;
      border-radius:50%;
      position:relative;
      left:59%;
      top:-170px;
      border-color:royalblue;
      border-style:ridge;
      border-width:5px;
      box-shadow:-6px 6px 0 hsl(16, 100%, 30%);
      transition:0.5s;

}
.button:hover{
    transform:scale(1.2);
}

    </style>
<body>
    <a href="register.php">
        <button type="button" class="btn"><p style="font-size:40px">NEW CUSTOMER</p></button>
    </a>
    <br>
    <a href="login.php">
        <button type="button" class="button"><p style="font-size:40px">EXISTING CUSTOMER</p></button>
    </a>
</body>

</html>