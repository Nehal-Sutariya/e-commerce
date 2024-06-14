<?php

include("connection.php");

$fnm = $_REQUEST['fnm'];
$lnm = $_REQUEST['lnm'];
$addr = $_REQUEST['addr'];
$city = $_REQUEST['city'];
$contno = $_REQUEST['contno'];
$email = $_REQUEST['email'];
$gender = $_REQUEST['gender']; // Assuming 'gender' is a radio button with value 'male' or 'female'
$unm = $_REQUEST['unm'];
$pass = $_REQUEST['pass'];
$utype = $_REQUEST['utype']; // Corrected array index

$query = "INSERT INTO registration(fnm, lnm, addr, city, contno, email, gender, unm, pass, utype) 
          VALUES ('$fnm', '$lnm', '$addr', '$city', '$contno', '$email', '$gender', '$unm', '$pass', '$utype')";

$result = mysql_query($query);

if ($result) {
    echo "Record inserted successfully";
    header("Location: ../index.php?page=login");
    exit();
} else {
    echo "Error inserting record: " . mysql_error();
    header("Location: ../index.php?page=registration&msg=1");
    exit();
}

mysql_close($con);
?>

