<?php

include("connection.php");

$query = "DELETE FROM addtocart WHERE p_id=" . $_REQUEST['p_id'];

if (mysql_query($query, $con)) {
    header("location: ../index.php?page=addtocart");
    exit();
} else {
    echo "Failed to delete record: " . mysql_error();
}

mysql_close($con);
?>
