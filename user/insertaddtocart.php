<?php
session_start();

if (isset($_SESSION["r_id"])) {
    require_once("action/connection.php");

    if (isset($_REQUEST['stock'])) {
        $stock = $_REQUEST['stock'];

        // Insert into addtocart table
        $query = "INSERT INTO addtocart (r_id, p_id, stock) VALUES ('" . $_SESSION['r_id'] . "', '" . $_REQUEST['p_id'] . "', '" . $stock . "')";
        $result = mysql_query($query, $con);

        if ($result) {
            header("Location: index.php?page=product");
            exit;
        } else {
            echo mysql_error();
        }
    } else {
        header("Location: index.php?page=itemdetail&p_id=" . $_REQUEST['p_id'] . "&msg=Stock not available");
        exit;
    }
} else {
    header("Location: index.php?page=login");
    exit;
}
?>
