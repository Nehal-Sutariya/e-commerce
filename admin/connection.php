<?php

$con = mysql_connect("localhost", "root", "root");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("handloom_shopping_site", $con);
session_start();

?>
