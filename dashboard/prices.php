<?php   
session_start();  
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["transactions"])){  
    header("location:../login/index.htm");  
} else {  

$query = "SELECT * FROM info"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);


$route = "ROUTE INFO";
$ticketprice = "TICKET PRICE";



echo "<table>"; // start a table tag in the HTML
echo "<tr><th>".$route. "&#9;</th><th>".$ticketprice. "&#9;</th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['routes'] . "&#9;</td><td>".$row['ticket_price'] . "&#9;</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; 
echo"<a href='../dashboard/admin.php'>Back to your profile.</a>";

}
mysqli_close($conn);
?>
	
    	