<?php
// establish database connection
$servername = "localhost";
$username = "root";
$password = "chris29!";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['name'],$_POST['password'], $_POST['email'], $_POST['insurance_type'], $_POST['address'], $_POST['phone'], $_POST['job'],$_POST['user_type']
)) {
  // Set the parameters
  $name = $_POST['name'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $insurance_type = $_POST['insurance_type'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $job = $_POST['job'];
  $user_type = $_POST['user_type'];

  // Prepare the insert statement
  $stmt = $conn->prepare("INSERT INTO user_form (name,password, email, insurance_type, address, phone, job, user_type) VALUES (?,?, ?, ?, ?, ?, ?, ?)");

  // Bind the parameters
  $stmt->bind_param("ssssssss", $name,$password, $email, $insurance_type, $address, $phone, $job, $user_type);

  // Execute the statement
  if ($stmt->execute()) {
      header('Location: process-payment.php');
      exit;
  } else {
      echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  mysqli_close($conn);
} else {
  echo "<script>alert('Error: FILL THE FORM!.');</script>";
}
?>
