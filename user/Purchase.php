<?php

// Display message based on the 'msg' parameter
if (isset($_REQUEST['msg'])) {
    if ($_REQUEST['msg'] == 1) {
        echo "<center><font color='blue'>Shipping has been sent successfully.</font></center>";
    } else {
        echo "<center><font color='red'>Shipping was not successful.</font></center>";
    }
}

// Check if session 'r_id' is set
session_start();
if (isset($_SESSION['r_id'])) {
    ?>
    <div id="h1">
        <?php
        // Establish database connection using MySQLi
        $con = new mysqli("localhost", "root", "root", "handloom_shopping_site");

        // Check connection
        if ($con->connect_error) {
            die("<center>Connection failed: " . $con->connect_error . "</center>");
        }

        // Retrieve data from 'bill' table
        $que = "SELECT * FROM bill";
        $result = $con->query($que);

        if ($result) {
            echo "<center>";
            echo "<font face='Brush Script MT' color='#005E8A' size='8'><h3>View Purchase</h3></font>";
            echo "<table border='1' align='center' bgcolor='#AAD4F7'>";
            echo "<tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact No</th>
                    <th>Total</th>
                    <th colspan='3'>Action</th>
                  </tr>";

            // Fetch and display each row of the result set
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contactno']) . "</td>";
                echo "<td>" . htmlspecialchars($row['total']) . "</td>";
                echo "<td><a href='index.php?page=view&b_id=" . htmlspecialchars($row['b_id']) . "'>View</a>&nbsp;&nbsp;</td>";
                echo "<td><a href='index.php?page=shipping&b_id=" . htmlspecialchars($row['b_id']) . "'>Shipping</a></td>";
                echo "<td><a href='action/d_purchase.php?b_id=" . htmlspecialchars($row['b_id']) . "'><img src='image/33.png' height='20px' alt='Delete'/></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</center>";
        } else {
            echo "<center>Unable to retrieve data: " . $con->error . "</center>";
        }

        // Close the database connection
        $con->close();
        ?>
    </div>
    <?php
} else {
    echo "<center>URL not Found</center>";
}
?>
