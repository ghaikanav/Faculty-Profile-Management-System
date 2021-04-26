<?php

$a_no = $_GET["dept"];

$pwd = $_GET["year"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "select SUM(budget) as val_sum from project";



$result = $con->query($sql);



 

if($result)
{

 while($row = $result->fetch_assoc())

 {

   printf("Total budget in $pwd years alloted to $a_no department :");
   echo htmlentities($row['val_sum']);

 }
 $result->free();

}

else {
      echo "fail login ";
      }



$con->close();

 

?>

