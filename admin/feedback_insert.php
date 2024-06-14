<?php

include("connection.php");
session_start();

$feedback = $_REQUEST['feedback'];
$r_id = $_SESSION['r_id'];

$query = "INSERT INTO feedback(r_id, feedback) VALUES ('$r_id', '$feedback')";
$res = mysql_query($query, $con);

if ($res) {
    header("location: ../index.php?page=feedback&msg=1");
    exit();
} else {
    echo "Failed to insert feedback: " . mysql_error();
}

mysql_close($con);
?>
