<?php
$username = $_POST['username'];
$password = $_POST['password'];


$host = "localhost";
$dbUsername = "root"; 
$dbPassword = ""; 
$dbname = "leave_mate";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login_page WHERE user_name = ? AND password = ?";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);


$stmt->execute();


$stmt->store_result();

if ($stmt->num_rows > 0) {
  
    header('location:menupage.html');
} else {
    
    header('location:wrong.html') ;
    echo "<script>alert('Invalid username or current password! Please try again.')</script>";
}



?>
