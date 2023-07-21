<?php
session_start();
$id = $_SESSION['login'];
$curl = curl_init();
$amt = $_SESSION['amount'];
$email = $_SESSION['emailid'];
$_SESSION['newrefid'] = $_SESSION['reffid'];
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_14f77eeb8e6eb6029ccd99720938bc7449bb69b1",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());$amount = ($tranx->data->amount)/100;
$date = $tranx->data->transaction_date;
$status = $tranx->data->status;
$ref = $tranx->data->reference;
$_SESSION['reference'] = $tranx->data->reference;
$amt = $_SESSION['amount'];

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
  $query = "UPDATE `useracc` SET `accdet`=`accdet` + '$amt' WHERE `email` = '$email'";
  $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
  header ("Location: https://localhost/itrans/dashboard/");
}
mysqli_close($conn);