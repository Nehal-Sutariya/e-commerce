<?php

$con = mysql_connect("localhost", "root", "root");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

$db = mysql_select_db("krishnajewelleryshopping", $con);
if (!$db) {
    die('Could not select database: ' . mysql_error());
}

session_start();

$b_id = $_REQUEST['b_id'];
$r_id = $_SESSION['r_id'];
$b1_name = $_REQUEST['b_name'];
$b1_address = $_REQUEST['b_address'];
$b1_city = $_REQUEST['b_city'];
$b1_contactno = $_REQUEST['b_contactno'];
$pur_date = date('Y-m-d');
$b1_total = $_REQUEST['b_total'];

$query2 = "INSERT INTO bill (b_id, r_id, pur_date, b_name, b_address, b_city, b_contactno, b_total) 
           VALUES (null, '$r_id', '$pur_date', '$b1_name', '$b1_address', '$b1_city', '$b1_contactno', '$b1_total')";

$result2 = mysql_query($query2, $con);
if (!$result2) {
    die('Invalid query: ' . mysql_error());
}

$query3 = "SELECT MAX(b_id) AS max_id FROM bill";
$result3 = mysql_query($query3, $con);
$id_row = mysql_fetch_array($result3);
$id = $id_row['max_id'];

$query4 = "SELECT * FROM addtocart WHERE r_id = '$r_id'";
$result4 = mysql_query($query4, $con);

while ($row = mysql_fetch_array($result4)) {
    $stock = $row['stock'];
    $p_id = $row['p_id'];

    $query5 = "UPDATE product SET stock = stock - $stock WHERE p_id = '$p_id'";
    mysql_query($query5, $con);

    $query6 = "INSERT INTO billl (bl_id, b_id, p_id, stock) 
               VALUES (null, '$id', '$p_id', '$stock')";
    mysql_query($query6, $con);
}

$query7 = "DELETE FROM addtocart WHERE r_id = '$r_id'";
if (mysql_query($query7, $con)) {
    header("location: ../index.php?page=purchase_success");
} else {
    die('Error deleting from addtocart: ' . mysql_error());
}

mysql_close($con);

?>
