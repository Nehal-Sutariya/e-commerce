<?php

// Start session if not already started
session_start();

// Include database connection file
include("action/connection.php");

// Get current date
$date = date('Y-m-d');

// Insert data into the bill table
$bill = $con->prepare("INSERT INTO bill (b_id, r_id, pur_date, b_name, b_address, b_city, b_contactno, b_total) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$bill->bind_param("iisssssi", $_SESSION['b_id'], $_SESSION['r_id'], $date, $_REQUEST['b_name'], $_REQUEST['b_address'], $_REQUEST['b_city'], $_REQUEST['b_contactno'], $_REQUEST['b_total']);
$result1 = $bill->execute();

// Get max b_id from the bill table
$max = "SELECT MAX(b_id) AS max_b_id FROM bill";
$result2 = $con->query($max);
$fetch = $result2->fetch_assoc();
$b_id = $fetch['max_b_id'];

// Retrieve items from the addtocart table
$select_cart = $con->prepare("SELECT * FROM addtocart WHERE r_id = ?");
$select_cart->bind_param("i", $_SESSION['r_id']);
$select_cart->execute();
$result3 = $select_cart->get_result();

while ($row = $result3->fetch_assoc()) {
    // Insert data into the bill1 table for each item in the cart
    $bill1 = $con->prepare("INSERT INTO bill1 (b1_id, b_id, p_id, stock) VALUES (?, ?, ?, ?)");
    $bill1->bind_param("iiii", $b_id, $row['id'], $row['p_id'], $row['stock']);
    $bill1->execute();
}

// Delete items from addtocart after successful insertion into bill1
$delete = $con->prepare("DELETE FROM addtocart WHERE r_id = ?");
$delete->bind_param("i", $_SESSION['r_id']);
if ($delete->execute()) {
    // Redirect to the purchase success page
    header("location: ../index.php?page=purchase_success");
    exit();
} else {
    echo "Failed to delete items from cart: " . $con->error;
}

// Close the database connection
$con->close();

?>
