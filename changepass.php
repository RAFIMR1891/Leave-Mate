<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "leave_mate"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_name = $_POST['username'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];


$sql = "SELECT * FROM login_page WHERE user_name = '$user_name' AND password = '$current_password'";
$result = $conn->query($sql);
 

if ($result->num_rows > 0) {  
    $update_sql = "UPDATE login_page SET password = '$new_password' WHERE user_name = '$user_name'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Password changed successfully!";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "<script>alert('Invalid username or current password! Please try again.')</script>";
}

$conn->close();
?>
