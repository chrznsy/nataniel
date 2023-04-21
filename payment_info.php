<?php

  
@include 'config.php';

$sql = "SELECT * FROM payment_histoy";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client's Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #ffffff;
        }
        .site-header {
          background-color: #3498db;
            color: #fff;
            padding: 10px 0;
        }
        .site-header h1 {
            margin: 0;
            font-size: 40px;
            font-weight: 700;
        }
        .site-header p {
            margin: 0;
            font-size: 18px;
            font-weight: 300;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            margin: 30px auto;
            font-size: 16px;
            line-height: 1.5;
            border: 1px solid #cccccc;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #cccccc;
        }
        th {
          background-color: #3498db;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e3f2fd;
        }
    </style>
</head>
<body>
    
    <header class="site-header">
        <div class="container">
            <h1 class="site-title">Payment History</h1>
            <p>View details below:</p>
        </div>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Ammount</th>
                    <th>Payment Type</th>
                    <th>Date</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>₱<?php echo $row['amount']; ?></td>
                    <td><?php echo $row['payment_type']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    
                   

      
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
