<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Home page</title>
</head>

<body>
<img class="pic" id="logo" src="IITPatna_Logo.jpg">
<h1 class="pea">INDIAN INSTITUTE OF TECHNOLOGY PATNA</h1>
<p class="ser"><button type="button" class="btn btn-secondary">Home</button>
<a href="insert_c.html"><button type="button" class="btn btn-secondary">Add conference</button></a>
<a href="insert_j.html"><button type="button" class="btn btn-secondary">Add journal</button></a>
<a href="insert_p.html"><button type="button" class="btn btn-secondary">Add project<button></a>
<a href="view.html"><button type="button" class="btn btn-secondary">Show Faculty Work</button></a>
<a href="home.html"><button type="button" class="btn btn-secondary">Logout</button></a>
</p>
</body>
</html>

<?php

$a_no = $_GET["username"];

$pwd = $_GET["password"];

 

$con = new mysqli("localhost","root","","project_dbms");

 

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

$sql = "select * from login where username = '$a_no' and password = '$pwd'";

 

$result = $con->query($sql);

 

$count = mysqli_num_rows($result); 

if($count==1)
{

	$sql1 = "select name from faculty where fid = '$a_no'";
	$res = $con->query($sql1);

 while($row = $result->fetch_assoc() && $row1=mysqli_fetch_row($res))

 {

   printf("Welcome %s!\n",$row1[0]);
   echo "<br>";
   //<a href="insert.html">Add conference</a><br>
   //include('insert.html');

 }
 $result->free();

}
else {
	echo "login failed!";
	echo "<br>";
    echo "Try again!";
    include('facultydata.html');
}


if($count==1)
{
	$a_no = $row1[0];

$sql = "select * from conference where ath like '%$a_no%'";

$result = $con->query($sql);

 


if($result)
{	
	
    
    echo "My Conferences: "; echo "<br>";
    echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                        <th>Conference Paper Id</th>
                        <th>Title</th>
                        <th>Conference Name</th>
                        <th>Authors</th>
                        <th>Page Start</th>
                        <th>Page End</th>
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


$sql = "select * from journal where ath like '%$a_no%'";
$result = $con->query($sql);


if($result)
{
    echo "<br>";

    echo "My Journals: "; echo "<br>";
     echo "<table border='1'>";
    echo "  <thead>
                    <tr>
                        <th>Journal Id</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Authors</th>
                        <th>Volume</th>
                        <th>Number</th>
                        <th>Page Start</th>
                        <th>Page End</th>
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

$sql = "select * from project where pi like '%$a_no%' OR copi like '%$a_no%' ";

$result = $con->query($sql);

 

//$count = mysqli_num_rows($result); 

if($result)
{
    echo "<br>";
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



}

/*$con->close();*/




$con->close();

 

?>

