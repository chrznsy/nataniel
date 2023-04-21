<?php
// Start PHP code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}


$name = $_SESSION['user_name']; 
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

$stmt = $conn->prepare("SELECT * FROM payment_histoy WHERE name = ?");
$stmt->bind_param("s", $name);
if (!$stmt->execute()) {
  die("Error: ".$stmt->error);
}
$result = $stmt->get_result();
$stmt->close();

if (mysqli_num_rows($result) == 0) {
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Client</title>
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
    .button {
      display: inline-block;
      background-color: #3498db;
      border: none;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.5; }
      h2 {
        text-align: center;
      margin-top: 50px;
      }
      p {
      text-align: center;
      margin-top: 50px;
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
  <h1>Client Dashboard</h1>
  <table>
    <tr>
      <th>Client Details</th>
    </tr>
    <tr>
      <td>Name: <?php echo $row['name']; ?></td>
    </tr>
    <tr>
      <td>Email: <?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td>Occupation:<?php echo $row['job']; ?></td>
    </tr>

    <tr>
      <td>Address: <?php echo $row['address']; ?></td>
    </tr>
    <tr>
      <td>Phone #:<?php echo $row['phone']; ?></td>
    </tr>
    <tr>
      <td>Insurance type: <?php echo $row['insurance_type']; ?></td>
    </tr>
    <tr>
      <td>Date Registered: <?php echo $row['date']; ?></td>
    </tr>
  </table>
  <form action="process_payment.php" method="POST">
   <input type="hidden" name="amount" value="10.00">
   <input type="hidden" name="description" value="Payment for client services">
   <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
   <button type="submit" name="submit" style="background-color: #2f80ed; color: #fff; font-size: 16px; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; justify-content: center;">Make Payment</button>
</form>

  
  <h2>Payment History</h2>
  <?php if ($result->num_rows > 0) { ?>
    <table>
      <tr>
        <th>Date</th>
        <th>Amount</th>
        <th>Email</th>
        <th>Payment Method</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['date']; ?></td>
          <td>₱<?php echo $row['amount']; ?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['payment_type']?></td>
        </tr>
      <?php } ?>
    </table>
  <?php } else { ?>
    <p>No payment history found.</p>
  <?php } ?>
</body>
</html>
<?php
$conn->close();
?>
