<?php
session_start();

$username = $_SESSION['login'];
$referid = $_SESSION['reference'];
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
$rs=mysqli_query($conn,"select * from refid WHERE refids='$referid'");
if(mysqli_num_rows($rs)>0){
    $rs=mysqli_query($conn,"select * from refid WHERE refids='$referid'");
    $row = mysqli_num_rows($rs);
    if($row['transval']==0){
  // do something
  
  header("Location: https://www.iTransdata.com.ng/dashboard/error.php");
}
else{
    $_SESSION["success"] = "Successful";
  header("Location: https://www.iTransdata.com.ng/dashboard/success.php");

}
}
else{


$curl = curl_init();

$network = $_SESSION['netw'];
$mnumber = $_SESSION['num'];//the amount in kobo. This value is actually NGN 300
$plan = $_SESSION['plans'];
// url to go to after payment


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.lintolpay.com/api/data/",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'network'=>$network,
    'mobile_number'=>$mnumber,
    'plan'=>$plan
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Token 1016fca413727b0aa9876d9274b4b0b6bd532ed5", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
   CURLOPT_RETURNTRANSFER => true
)
);

$response = curl_exec($curl);
$tranx = json_decode($response,true);

if(isset($tranx['error'])){
  // do something
  $transvalue = 0;
  $query="insert into refid(username, refids,transval) values('$username','$referid','$transvalue')";
  mysqli_query($conn,$query) or die("Could Not Perform the Query");
  header("Location: https://www.iTransdata.com.ng/dashboard/error.php");
}
else{
    $transvalue = 1;
    $query="insert into refid(username, refids,transval) values('$username','$referid','$transvalue')";
    mysqli_query($conn,$query) or die("Could Not Perform the Query");
    $_SESSION["success"] = "Successful";
    header("Location: https://www.iTransdata.com.ng/dashboard/success.php");

}
}
mysqli_close($conn);