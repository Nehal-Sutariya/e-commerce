<?php

include("connection.php");

$uname = $_REQUEST['uname'];

if (isset($uname)) {
    $query = "SELECT * FROM registration WHERE unm='$uname'";
    $res = mysql_query($query, $con);

    if ($row = mysql_fetch_array($res)) {
        $nm = $row['unm'];
        if ($uname == $nm) {
            header("location: ../index.php?page=forgotpass1&unm=$uname");
            exit();
        } else {
            header("location: ../index.php?page=forgotpass&msg=0");
            exit();
        }
    } else {
        header("location: ../index.php?page=forgotpass&msg=1");
        exit();
    }
}

?>
