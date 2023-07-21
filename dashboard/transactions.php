<?php   
session_start();  
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["transactions"])){  
    header("location:../login/index.htm");  
} else {  

$query = "SELECT * FROM transactions"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$email = "EMAIL";
$routeid = "ROUTE INFO";
$ticketid = "TICKET ID";
$ticketstatus = "STATUS";


echo "<table>"; // start a table tag in the HTML
echo "<tr><th>".$email. "&#9;</th><th>".$ticketid. "&#9;</th><th>".$routeid. "&#9;</th><th>".$ticketstatus. "&#9;</th><th>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['email'] . "&#9;</td><td>".$row['routeid'] . "&#9;</td><td>" . $row['ticketid'] ."&#9;</td><td>" . $row['Status'] . "&#9;</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; 
echo"<a href='../dashboard/admin.php'>Back to your profile.</a>";

}
mysqli_close($conn);
?>
	
    	