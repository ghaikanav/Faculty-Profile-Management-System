<?php

$a_no = $_GET["fname"];

$pwd = $_GET["years"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "select tp,cname,ath,year from conference where ath like '%$a_no%' AND year + $pwd >= year(curdate())";

$result = $con->query($sql);

 

//$count = mysqli_num_rows($result); 

if($result)
{
	echo "My Conferences: "; echo "<br>";
    echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                    
                        <th>Title</th>
                        <th>Conference Name</th>
                        <th>Authors</th>
                        
                        <th>Year</th>
                    </tr>
                </thead>";
  
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
	echo "<br>";*/
    echo "Try again!";
    include('view.html');
}


$sql = "select tp,jname,ath,vol,no,year from journal where ath like '%$a_no%' AND year + $pwd >= year(curdate())";
$result = $con->query($sql);


if($result)
{
	echo "<br>";

    echo "My Journals: "; echo "<br>";
     echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                        
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Authors</th>
                        <th>Volume</th>
                        <th>Number</th>
                        
                        <th>Year</th>
                    </tr>
                </thead>";
  
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
	echo "<br>";*/
    echo "Try again!";
    include('view.html');
}

$sql = "select pname,spons_agency,budget,pi,copi from project where pi like '%$a_no%' OR copi like '%$a_no%' ";

$result = $con->query($sql);

 

//$count = mysqli_num_rows($result); 

if($result)
{
    echo "<br>";
    echo "My Projects: "; echo "<br>";

  echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                        
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



$con->close();

 

?>

