<?php


$f_id = $_GET["fid"];

$name = $_GET["name"];

$dept = $_GET["dept"];

$doj = $_GET["doj"];

$psw = $_GET["password"];

$cpsw = $_GET["cpsw"];
 

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
    include('insert.html');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}


 

?>

