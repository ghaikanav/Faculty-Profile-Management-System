<?php

$a_no = $_GET["fac_id"];

$pwd = $_GET["years"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "select pbid,topic,dop from publication where fac_id = '$a_no' and datediff('2019-11-07',dop)/365 < '$pwd'";

 

$result = $con->query($sql);

 

 

if($result)
{

 while($row = $result->fetch_assoc())

 {

   		printf("Project_id : %s -- Topic: %s -- Date of publication: %s ",$row["pbid"], $row['topic'], $row['dop']);


 }
 $result->free();

}



$con->close();

 

?>

