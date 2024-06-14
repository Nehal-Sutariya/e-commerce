<?php

include("connection.php");

$query = "DELETE FROM registration WHERE r_id=" . $_REQUEST['r_id'];
$result = mysql_query($query);

if ($result) {
    header("location: ../index.php?page=viewregister");
    exit();
} else {
    echo "Failed to delete record: " . mysql_error();
}

mysql_close();
?>
