<?php
session_start();

if (isset($_SESSION["r_id"])) {
    require_once("action/connection.php");

    if (isset($_REQUEST['p_id'])) {
        $p_id = $_REQUEST['p_id'];

        // Prepare statement to fetch product details
        $query = "SELECT * FROM product WHERE p_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'i', $p_id);

        // Execute statement
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        echo "<h1 align='center'><font face='Brush Script MT' color='black' size='10'>Item Detail</font></h1>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<center>";
            echo "<form name='itemDetail' action='index.php?page=insertaddtocart' method='POST' onsubmit='return check_valid();'>";
            echo "<table align='center' border='6'>";
            echo "<tr>";
            echo "<td rowspan='9'>";
            echo "<img src='upload/" . htmlspecialchars($row['image']) . "' height='200' width='200'>";
            echo "</td>";
            echo "</tr>";

            if (isset($_REQUEST['msg'])) {
                echo "<tr>";
                echo "<td><font color='red' size='5pt'>" . htmlspecialchars($_REQUEST['msg']) . "</font></td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td><b>Name:</b> " . htmlspecialchars(ucwords($row['p_name'])) . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='pad' id='detail_font'><b>Price:</b> " . htmlspecialchars($row['price']) . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='pad' id='detail_font'><b>Description:</b> " . htmlspecialchars($row['description']) . "</td>";
            echo "</tr>";

            $quantity = $row['stock'];
            if ($quantity == 0) {
                $msg = "Item sold out";
                echo "<tr>";
                echo "<td><font color='red' size='5pt'>$msg</font></td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<td><b>Quantity:</b> <input type='number' name='stock' id='quantity' class='textbox' min='1' max='" . htmlspecialchars($quantity) . "' required></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><input type='submit' value='Add To Cart' style='width:120px' class='button'></td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<input type='hidden' name='p_id' value='" . htmlspecialchars($p_id) . "'>";
            echo "</form>";
            echo "<a href='index.php?page=addtocart'>Back</a>";
            echo "</center>";
        }

        // Free result set
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "<center><img src='images/007.gif' height='300px'><br><font id='rewrite'>But you can't rewrite URL...</font></center>";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "<center><img src='images/007.gif' height='300px'><br><font id='rewrite'>But you can't rewrite URL...</font></center>";
}
?>
