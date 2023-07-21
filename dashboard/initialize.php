<?php
session_start();  

if(!isset($_SESSION["login"])){
    header("Location: https://www.iTransdata.com.ng/login/login.php");
   }
   else {
    $conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
$curl = curl_init();

$email = $_SESSION["emailid"];
$amount = ($_SESSION['amount'] + ((2.0/100) * $_SESSION['amount'] )) * 100;  //the amount in kobo. 

// url to go to after payment
$callback_url = 'https://localhost/itrans/dashboard/callback.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_14f77eeb8e6eb6029ccd99720938bc7449bb69b1", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ]
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
//print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
$_SESSION['referenceid'] = $tranx['data']['authorization_url'];
$_SESSION['reffid'] = 0;
header('Location: ' . $tranx['data']['authorization_url']);
   }
   mysqli_close($conn);