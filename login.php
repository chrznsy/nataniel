<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

  
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:xample.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login </title>
   <link rel="stylesheet" href="./">
   <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="asset/">

   


   <style>
      /* Custom styles */
      body {
         background-color: #fff;
      }

      .form-container {
         background-color: #fff;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
         max-width: 500px;
         margin: 50px auto;
         padding: 20px;
         text-align: center;
      }

      h3 {
         color: #1a73e8;
         margin-bottom: 20px;
      }

      input[type="email"],
      input[type="password"] {
         border: 2px solid #1a73e8;
         border-radius: 5px;
         font-size: 16px;
         margin-bottom: 10px;
         padding: 10px;
         width: 100%;
      }

      input[type="submit"] {
         background-color: #1a73e8;
         border: none;
         border-radius: 5px;
         color: #fff;
         cursor: pointer;
         font-size: 18px;
         margin-top: 10px;
         padding: 10px;
         transition: background-color 0.2s ease-in-out;
         width: 100%;
      }

      input[type="submit"]:hover {
         background-color: #0d47a1;
      }

      p {
         font-size: 16px;
         margin-top: 20px;
      }

      a {
         color: #1a73e8;
      }

      .error-msg {
         color: red;
         display: block;
         margin-top: 10px;
         text-align: left;
      }
   </style>
</head>
<body>
<header class="site-header">
				<div class="top-header">
					<div class="container">
						<a href="index.html" id="branding">
						
							<div class="logo-text">
								<h1 class="site-title">Insurance</h1>
								<small class="description">make sure your life secure</small>
							</div>
						</a> <!-- #branding -->
					
						<div class="right-section pull-right">
							<a href="#" class="phone"><img src="images/icon-phone.png" class="icon"></a>
						</div>
					</div> <!-- .container -->
				</div> <!-- .top-header -->

				
				<div class="bottom-header">
					<div class="container">
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item current-menu-item"><a href="about.html">About us</a></li>
								<li class="menu-item"><a href="insurance.html">Insurance plans</a></li>
								<li class="menu-item"><a href="resource.html">Resources</a></li>
								<li class="menu-item"><a href="contact.html">Contact</a></li>
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
				
			</header>
   <div class="form-container">

      <form action="" method="post">
         <h3>Login</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" placeholder="Enter your email" required>
         <input type="password" name="password" placeholder="Enter your password" required>

         <input type="submit" name="submit" value="Login">

<p>Don't have an account? <a href="register_form.html">Sign up</a></p>
</form>
</div>
</body>
</html>

<?php mysqli_close($conn); ?>
