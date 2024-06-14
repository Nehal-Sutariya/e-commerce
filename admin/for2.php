<?php

include("connection.php");

$uname = $_REQUEST['uname'];
$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];

if (isset($pass1) && isset($pass2)) {
    if ($pass1 == $pass2) {
        $query = "UPDATE registration SET pass='$pass2' WHERE unm='$uname'";
        if (mysql_query($query, $con)) {
            // Password updated successfully
            header("location: ../index.php?page=login");
            exit();
        } else {
            echo "Invalid query: " . mysql_error();
        }
    } else {
        // Passwords do not match
        header("location: ../index.php?page=forgotpass1&msg=0");
        exit();
    }
}

?>
