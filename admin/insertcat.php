<?php

include("connection.php");

if (isset($_REQUEST['c_id'])) {
    $query = "UPDATE category SET c_name='" . $_REQUEST['name'] . "' WHERE c_id=" . $_REQUEST['c_id'];
    $result = mysql_query($query);

    if ($result) {
        echo "Record updated";
        header("location: ../index.php?page=category");
        exit();
    } else {
        echo "Failed to update record: " . mysql_error();
    }
} else {
    $c_name = $_REQUEST['name'];
    $query = "INSERT INTO category(c_name) VALUES ('$c_name')";
    $result = mysql_query($query);

    if ($result) {
        echo "Record inserted";
        header("location: ../index.php?page=category");
        exit();
    } else {
        echo "Failed to insert record: " . mysql_error();
    }
}

mysql_close($con);

?>
