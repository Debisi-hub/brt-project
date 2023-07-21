<?php   
session_start();  
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["transactions"])){  
    header("location:../login/index.htm");  
} else { 
    $timef = "TIMEFRAME";
    $amountg = "AMOUNT GENERATED"; 
    
   
        $query = "select date_format(`Date`, '%M %Y'),sum(amount)
        from transactions
        group by year(`Date`),month(`Date`)"; //You don't need a ; like you do in SQL
        $result = mysqli_query($conn,$query);
        
        echo "<h3>Monthly Report</h3><table style='text-align:center;'>"; // start a table tag in the HTML
echo "<tr><th>".$timef. "&#9;</th><th>".$amountg. "&#9;</th>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row["date_format(`Date`, '%M %Y')"] . "&#9;</td><td>".$row['sum(amount)'] . "&#9;</td></tr>"; 
    }
    echo "</table>"; 
echo"<a href='../dashboard/admin.php'>Back to your profile.</a>";
}
   


mysqli_close($conn);
?>
	