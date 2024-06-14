<?php

// Start session if not already started
session_start();

include("action/connection.php");

$date = date('Y-m-d');

// Insert into bill table
$bill = "INSERT INTO bill(b_id, r_id, pur_date, b_name, b_address, b_city, b_contactno, b_total) 
         VALUES (" . $_SESSION['b_id'] . ", " . $_SESSION['r_id'] . ", '$date', '" . $_REQUEST['b_name'] . "', '" . $_REQUEST['b_address'] . "', '" . $_REQUEST['b_city'] . "', '" . $_REQUEST['b_contactno'] . "', '" . $_REQUEST['b_total'] . "')";

$result1 = mysql_query($bill, $con);

// Get max b_id from bill table
$max = "SELECT MAX(b_id) FROM bill";
$result2 = mysql_query($max, $con);
$fetch = mysql_fetch_array($result2);
$b_id = $fetch[0];

// Retrieve items from addtocart
$select_cart = "SELECT * FROM addtocart WHERE r_id=" . $_SESSION['r_id'];
$result3 = mysql_query($select_cart, $con);

while ($row = mysql_fetch_array($result3)) {
    // Insert into bill1 table for each item in cart
    $bill1 = "INSERT INTO bill1(b1_id, b_id, p_id, stock) VALUES ('$b_id', '" . $row['id'] . "', '" . $row['p_id'] . "', '" . $row['stock'] . "')";
    $result5 = mysql_query($bill1, $con);
}

// Delete items from addtocart after successful insertion into bill1
$delete = "DELETE FROM addtocart WHERE r_id=" . $_SESSION['r_id'];
if (mysql_query($delete, $con)) {
    header("location: ../index.php?page=purchase_success");
    exit();
} else {
    echo "Failed to delete items from cart: " . mysql_error();
}

mysql_close($con);

?>
