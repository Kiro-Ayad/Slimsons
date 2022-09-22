<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    ob_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Overpass', sans-serif;

        }
        body{
            background-color: #fff;
        }
        #logo{
            margin: 2px 25px;
        }
        .close{
            padding: 8px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 46px;
            margin-left: 50px;
            
        }
       #close{
            color: black;   
            text-decoration: none;
        }
        #paymentcontainer{
            margin: 30px;
            padding: 30px;
        }
        #options{
            display: flex;
            justify-content: space-evenly;
            text-align: center;
            font-size: x-large;
        }
        #otherpayment, #cardpayment{
            cursor: pointer;
        }
        h2{
            text-align: center;
        }
        h5, h4{
            margin: 20px;
            margin-top: 40px;
        }
        .buttons{
            display: flex;
            justify-content: space-between;
            font-size: x-large;
        }
        #cardconfirmpay, #otherconfirmpay{
            background-color: transparent;
            border: none;
            font-size: x-large;
        }
        #cardinfo, #otherinfo{
            display: none;
            text-align: center;
            margin: 20px;
            flex-direction: column;
        }
        #card{
            /* display: flex;
            flex-direction: column; */
            font-size: 20px;
            margin: 30px 0;
            font-weight: 500;
            border: 2px solid;
            width: fit-content;
            padding: 30px;
            align-self: center;
            border-radius: 25px;
            /* box-shadow: 0px 2px 90px -20px rgba(0, 0, 0, 0.197); */
        }
        #card>label, #card>input[type=text]{
            margin: 20px 3px;
        }
        #columncontainer{
            display: flex;
            justify-content: space-between;
        }
        .rightcolum, .leftcolum{
            margin: 3px 15px;
        }
        #otherchangepay, #cardchangepay{
            cursor: pointer;
            text-align: left;
        }
        #codebox{
            width: fit-content;
            align-self: center;
            border: 2px solid;
            padding: 34px;
            font-size: 1.5em;
            border-radius: 10px;
        }
        #random
        {
            opacity: 0;
            /* visibility: hidden; */
            margin: 15px;
            animation-name: transition;
            /* animation-iteration-count: infinite; */
            animation-duration: 2s;
            animation-fill-mode: forwards;
            animation-delay: 5s;
        }
        @keyframes transition {
            0%{
                visibility: hidden;
                opacity: 0;
            }
            99%{
                opacity: 1;
            }
            100%{
                visibility: visible;
                opacity: 1;
            }
        }
        a, input[type=submit]{
            cursor: pointer;
        }

    </style>
</head>
<body>
    <nav>
        <img id="logo" src="images/logo.png" height="90px">
            <!-- REDIRECT to Subsricption page -->
        <span class="close"><a id="close" href="subscribtion.php">&times;</a> </span>               
        <hr>
    </nav>
        <div id="paymentcontainer">
            <div class="icons">
                <h2 id="title">Choose your method of payment</h2>
                <div id="options">
                    <div id="cardpayment" onclick="showcardpay();">
                        <h5>Accepted Debit or Credit Cards</h5>
                        <img src="images/visa.jpeg" alt="visa card icon" width="50px" height="40px">
                        <img src="images/mastercard.png" alt="master card icon" width="50px" height="40px">
                    </div>
                    <div id="otherpayment" onclick="showotherpay();">
                        <h5>Other Payment Methods</h5>
                        <img src="images/Aman1.png" width="60px" height="40px">
                        <img src="images/fawry.png"  width="70px" height="40px">
                    </div>
                </div>
            </div>

            <div id="cardinfo">
                <div class="buttons">
                    <p id="cardchangepay" onclick="showoptionspay();"><span>&larr; </span>Change payment method</p>
                    <a href="log.php"><input type="submit" name="selectplan" id="cardconfirmpay" value="Confirm payment &rarr;"></a>
                </div>
                <form id="card">
                    <label for="cname">Cardholder's name</label>
                    <input type="text" id="cname" name="cardname" placeholder="mostafa mohamed nabil" required> <br>
                    <label for="ccnum">Credit card number</label> 
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required maxlength="16"> 
                    <div id="columncontainer">
                        <div class="leftcolum">
                            <label for="expmonth">Valid Thru</label>
                            <input type="month" id="expdate" name="expdate" required>
                        </div>
                        <div class="rightcolum">
                            <label for="cvv">CVV/CVC</label>
                            <input type="text" id="cvv" name="cvv" placeholder="352" required maxlength="3">
                        </div>
                    </div>                         
                </form>
            </div>
            <form id="otherinfo" method="post">
                <div  class="buttons">
                    <p id="otherchangepay" onclick="showoptionspay();"><span>&larr; </span>Choose Other payment method</p>
                    <a href="log.php"><input type="submit" name="selectPlan" id="cardconfirmpay" value="Confirm payment &rarr;"></a>
                </div>
                <?php
                if(isset($_POST['selectPlan'])){
                header('location:log.php');
                }
                ?>
                <h4>Pay with your service provider using this code to start your SlimSons journey with us</h4>
                <div id="codebox">
                    <h6>You will receive your payment code in a few seconds...</h6>
                    <p id="random"> </p>
                </div>
            </form>
        </div>

    <script>
        var options = document.getElementById('options'),
            cardinfo = document.getElementById('cardinfo'),
            otherinfo = document.getElementById('otherinfo'),
            cardchange = document.getElementById('cardchangepay'),
            otherchange = document.getElementById('otherchangepay');

        function showcardpay(){
            options.style.display='none';
            cardinfo.style.display='flex';
            document.getElementById('title').innerHTML="Debit/Credit Card payment";
        }
        function showotherpay(){
            options.style.display='none';
            otherinfo.style.display='flex';
            document.getElementById('title').innerHTML="Payment Services";

            // var randomcode = Math.random();
            var randomcode = Math.floor(100000 + Math.random() * 9000000000);
            document.getElementById('random').innerHTML = randomcode;

            // document.getElementById('random').style.animation= 'transition';
        }
        function showoptionspay(){
            options.style.display='flex';
            otherinfo.style.display='none';
            cardinfo.style.display='none';
            document.getElementById('title').innerHTML="Choose your method of payment";

        }
    </script>
</body>
</html>