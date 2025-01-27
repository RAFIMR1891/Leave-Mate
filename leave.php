<?php
$a=$_POST['username'];
$b=$_POST['password'];
$con=mysqli_connect("localhost","root","","leave_mate");
$sql="INSERT INTO login_page(user_name,password) values('$a','$b')";
$r=mysqli_query($con,$sql);
if($r)

{
echo" USER DATA ADDED SUCCESSFULLY";
}
else{
    echo" USER DATA NOT ADDED ";
}


?>