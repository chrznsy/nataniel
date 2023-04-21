<?php

include 'config.php';


if(isset($_POST['name'],$_POST['email'],$_POST['amount'], $_POST['payment_type'])) {
    
    $email = $_POST['email'];
    $name = $_POST['name']; 
    $amount = $_POST['amount'];
    $payment_type = $_POST['payment_type'];

   
    $stmt = $conn->prepare("INSERT INTO payment_histoy (name, email, amount, payment_type) VALUES (?, ?, ?, ?)");

    
    $stmt->bind_param("ssss", $name, $email, $amount, $payment_type);

    
    if ($stmt->execute()) {
       
        header('Location: payment-sucess.php');
        exit;
    } else {
        
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
    mysqli_close($conn);
} else {
   
    echo "<script>alert('Error: FILL THE FORM!.');</script>";
}
?>