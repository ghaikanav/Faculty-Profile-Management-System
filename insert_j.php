<?php

include('dashboard.html');

$j_id = $_GET["jid"];

$tp = $_GET["tp"];

$a_no = $_GET["jname"];

$ath = $_GET["ath"];

$v = $_GET["vol"];

$no1 = $_GET["no"];

$pi = $_GET["pi"];

$pf = $_GET["pf"];

$y_ear = $_GET["y_ear"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "insert into journal values('$j_id','$tp','$a_no','$ath','$v','$no1','$pi','$pf','$y_ear')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
     echo "<br>";
    include('insert.html');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    echo "<br>";
    echo "TRY AGAIN!!"; echo "<br>";
    include('insert_c.html');
}

$con->close();

 

?>

