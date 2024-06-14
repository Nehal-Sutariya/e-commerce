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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Purchase</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f4f4f4;
            }
            .purchase-table {
                margin: 20px auto;
                border: 1px solid #AAD4F7;
                background-color: #AAD4F7;
                padding: 10px;
            }
            .purchase-table th, .purchase-table td {
                padding: 8px;
                border: 1px solid #005E8A;
            }
            h3 {
                color: #005E8A;
                font-family: 'Brush Script MT', cursive;
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div id="h1">
            <h3>View Purchase</h3>
            <table class="purchase-table">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact No</th>
                    <th>Total</th>
                    <th colspan='3'>Action</th>
                </tr>
                <?php
                // Establish database connection using MySQLi
                $con = new mysqli("localhost", "root", "root", "handloom_shopping_site");

                // Check connection
                if ($con->connect_error) {
                    die("<tr><td colspan='7'><center>Connection failed: " . $con->connect_error . "</center></td></tr>");
                }

                // Retrieve data from 'bill' table
                $que = "SELECT * FROM bill";
                $result = $con->query($que);

                if ($result->num_rows > 0) {
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
                } else {
                    echo "<tr><td colspan='7'><center>No records found</center></td></tr>";
                }

                // Close the database connection
                $con->close();
                ?>
            </table>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<center>URL not Found</center>";
}
?>
