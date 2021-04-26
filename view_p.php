<?php

//$a_no = $_GET["fname"];
$a_no = isset($_GET['fname']) ? $_GET['fname'] : '';
//$pwd = $_GET["years"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "select * from project where pi like '%$a_no%' OR copi like '%$a_no%' ";

$result = $con->query($sql);

 

//$count = mysqli_num_rows($result); 

if($result)
{
	echo "My Projects: "; echo "<br>";

  echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                        <th>Project Id</th>
                        <th>Project Name</th>
                        <th>Sponsorship Agency</th>
                        <th>Budget</th>
                        <th>Prof-in-Charge</th>
                        <th>Co-Prof-in-Charge</th>
                        
                    </tr>
                </thead>";while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";

}
else {
	/*echo "login failed!";
	echo "<br>";*/
    echo "Try again!";
    include('view_p.html');
}


/*$sql = "select * from journal where ath like '%$a_no%' AND year + $pwd >= year(curdate())";
$result = $con->query($sql);


if($result)
{
	echo "My Journals: "; echo "<br>";

  echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";

}
else {
	/*echo "login failed!";
	echo "<br>";
    echo "Try again!";
    include('view.html');
}*/


$con->close();

 

?>

