<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

$name = $_SESSION['admin_name']; 
$stmt = $conn->prepare("SELECT * FROM user_form WHERE name = ? ");
$stmt->bind_param("s", $name);
if (!$stmt->execute()) {
  die("Error: ".$stmt->error);
}
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$row) {

  die("Error: Could not retrieve client details.");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

	
		<link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #fff;
    }
    table {
      border-collapse: collapse;
      margin: 20px auto;
      width: 80%;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #3498db;
      color: #fff;
    }
    h1 {
      text-align: center;
      margin-top: 50px;
    }
    .button-container {
  display: flex;
  justify-content: center;
}
    .button {
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.2s ease-in-out;
  }
  .button:hover {
    background-color: #2980b9;
  }
      h2 {
        text-align: center;
      margin-top: 50px;
      }
      p {
      text-align: center;
      margin-top: 50px;
      }

  .button-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.button-container button {
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 20px;
  margin: 10px;
  background-color: transparent;
  color: #333;
  font-size: 16px;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
}

.button-container button:hover {
  background-color: #333;
  color: #fff;
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
						</a> 
					</div> <!-- .container -->
				</div> <!-- .top-header -->
      	<div class="bottom-header">
					<div class="container">
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="about.html">About us</a></li>
								<li class="menu-item current-menu-item"><a href="insurance.html">Insurance plans</a></li>
								<li class="menu-item"><a href="resource.html">Resources</a></li>
								<li class="menu-item"><a href="contact.html">Contact</a></li>
                <a href="logout.php">Logout</a>
								
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
  <h1>Admin Dashboard</h1>
  <table>
    <tr>
      <th>Admin Details</th>
    </tr>
    <tr>
      <td>Name: <?php echo $row['name']; ?></td>
    </tr>
    <tr>
      <td>Email: <?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td>Phone #: <?php echo $row['phone']; ?></td>
    </tr>
    <tr>
      <td>Address:  <?php echo $row['address']; ?></td>
    </tr>
    <tr>
      <td>Date Registered: <?php echo $row['date']; ?></td>
    </tr>
  </table>
  <div class="button-container">
  <button><a href="client_info.php" class="client_info">Show Client info</a></button>
  <br>
  <button><a href="payment_info.php" class="payment_info">Show Payment info</a></button>
</div>



  
</body>
</html>
<?php
$conn->close();
?>
