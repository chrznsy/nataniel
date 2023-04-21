<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insurance</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="asset/">
    <style>
      body {
        background-color: #f1f1f1;
      
      }
      
      

      .payment-form {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
      
        color: #1a73e8;
        padding: 50px;
        margin: 50px;
      }
  
      .payment-form label {
        font-size: 18px;
        font-weight: bold;
        color: #617691;
        
      }
  
      .payment-form input[type=text],
      .payment-form input[type=email],
      .payment-form input[type=tel],
      .payment-form input[type=number] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: block;
        border: 1px solid #1a73e8;
        border-radius: 4px;
        box-sizing: border-box;
      }
  
      .payment-form input[type=radio] {
        margin: 8px 0;
      }
  
      .payment-form button[type=submit] {
        background-color: #1a73e8;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        font-size: 20px;
        font-weight: bold;
        padding: 12px 20px;
        transition: background-color 0.3s ease;
        text-align: center;
      }
  
      .payment-form button[type=submit]:hover {
        background-color: #0c7cd5;
      }
  
      .plan {
        background-color: #1a73e8;
        border: 1px solid #2696f1;
        border-radius: 5px;
        padding: 20px;
        margin-top: 20px;
      }
  
      .plan h2 {
        color: #2196F3;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }
  
      .plan p {
        font-size: 18px;
        margin-bottom: 10px;
      }
  
      .plan .price {
        color: #fff;
        background-color: #349aec;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
      }
    </style>
</head>
<body><header class="site-header">
  <div class="top-header">
    <div class="container">
      <a href="index.html" id="branding">
        
        <div class="logo-text">
          <h1 class="site-title">Insurance</h1>
          <small class="description">make sure your life secure</small>
        </div>
      </a> <!-- #branding -->
    
      
    </div> <!-- .container -->
  </div> <!-- .top-header -->

  
  <div class="bottom-header">
    <div class="container">
      <div class="main-navigation">
        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
        <ul class="menu">
          <li class="menu-item"><a href="about.html">About us</a></li>
          <li class="menu-item"><a href="insurance.html">Insurance plans</a></li>
          <li class="menu-item"><a href="resource.html">Resources</a></li>
          <li class="menu-item"><a href="contact.html">Contact</a></li>
          <button><a href="login.php" class="login-button">LOGIN</a></button>
          
        </ul> <!-- .menu -->
      </div> <!-- .main-navigation -->
      
      <div class="social-links">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-pinterest"></i></a>
      </div>
      
      <div class="mobile-navigation"></div>
    </div>
  </div>
  <div class="payment-form">
    <h1>PAYMENT</h1>
    <form id="payment-form" action="payment.php" method="POST">
        <div>
            <label for="payment-method">Choose an Payment type:</label>
            <br>
            <input type="radio" id="gcash" name="payment_type" value="gcash">
            <label for="gcash">Gcash</label>
            <br>
            <input type="radio" id="paymaya" name="payment_type" value="Paymaya">
            <label for="paymaya">Paymaya</label>
            <br>
            <input type="radio" id="Bank" name="payment_type" value="Bank">
            <label for="Bank">Bank Transfer</label>
            <br>
          </div>
          <div>
            <br>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name">
          </div>
          <div>
            <br>
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email">
          </div>
          <div>
            <br>
            <label for="name">Amount</label>
            <input type="text" id="amount" name="amount" placeholder="Amount">
          </div>
          <div>
            <br>
            <button type="submit">SUBMIT</button>
          </div>
        </form>
      </div>
      

