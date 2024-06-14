<?php
session_start();

if (isset($_SESSION["r_id"])) {
    require_once("action/connection.php");

    if (isset($_REQUEST['stock'])) {
        $stock = $_REQUEST['stock'];
        $p_id = $_REQUEST['p_id'];

        // Prepare statement to insert into addtocart table
        $query = "INSERT INTO addtocart (r_id, p_id, stock) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'iii', $_SESSION['r_id'], $p_id, $stock);

        // Execute statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: index.php?page=product");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: index.php?page=itemdetail&p_id=" . $p_id . "&msg=Stock not available");
        exit;
    }

    mysqli_close($con);
} else {
    header("Location: index.php?page=login");
    exit;
}
?>
