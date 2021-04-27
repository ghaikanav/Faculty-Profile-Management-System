<?php


$f_id = $_REQUEST["fid"];

$name = $_REQUEST["name"];

$dept = $_REQUEST["dept"];

$doj = $_REQUEST["doj"];

$psw = $_REQUEST["password"];

$cpsw = $_REQUEST["cpsw"];
 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

if($psw !== $cpsw)
{
	echo "passwords don't match!! Try again :"; echo "<br>";
	include('register.html');
}

else
{
	$sql = "insert into faculty values('$f_id','$name','$dept','$doj')";

if ($con->query($sql) === TRUE) {
    //echo "New record created successfully";
    echo "<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$sql = "insert into login values('$f_id','$psw')";

if ($con->query($sql) === TRUE) {
    echo "New account created successfully";
    echo "<br>";
    include('dashboard.html');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}


 

?>

