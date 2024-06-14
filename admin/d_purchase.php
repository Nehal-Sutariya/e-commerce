<?php

include("connection.php");

$query = "DELETE FROM bill WHERE b_id=" . $_REQUEST['b_id'];
$result = mysql_query($query);

if ($result) {
    header("location: ../index.php?page=view_purchase");
    exit();
} else {
    echo "Failed to delete record: " . mysql_error();
}

mysql_close();
?>
