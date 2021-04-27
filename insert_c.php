<?php
include('dashboard.html');

$c_id = $_GET["cid"];

$tp = $_GET["tp"];

$a_no = $_GET["cname"];

$ath = $_GET["ath"];

$pi = $_GET["pi"];

$pf = $_GET["pf"];

$y_ear = $_GET["y_ear"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "insert into conference values('$c_id','$tp','$a_no','$ath','$pi','$pf','$y_ear') ";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<br>";
    include('dashboard.html');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    echo "<br>";
    echo "TRY AGAIN!!"; echo "<br>";
    include('insert_c.html');
}

$con->close();

 

?>

