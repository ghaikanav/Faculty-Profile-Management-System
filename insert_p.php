<?php
include('dashboard.html');


$a_no = $_GET["pid"];

$pn = $_GET["pname"];

$v = $_GET["spons_agency"];

$b = $_GET["budget"];

$pi = $_GET["pi"];

$copi = $_GET["copi"]; 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "insert into project values('$a_no','$pn','$v','$b','$pi','$copi')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
     echo "<br>";
    include('dashboard.html');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;

}

$con->close();

 

?>

