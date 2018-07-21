<?php

//get values submitted by form in waitlist modal (index.php)
$email = $_POST['email'];
$zipcode = $_POST['zipcode'];

$link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);

$stmt = mysqli_prepare($link, "INSERT INTO waitlist (email, zipcode) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, 'ss', $email, $zipcode);

//execute statement
mysqli_stmt_execute($stmt);

//close statement and connection
mysqli_stmt_close($stmt);

//close connection
mysqli_close($link);

?>