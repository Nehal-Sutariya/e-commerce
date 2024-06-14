<?php

if (isset($_REQUEST['msg'])) {
    if ($_REQUEST['msg'] == 1) {
        echo "<center><font color='blue'>...shipping has been sent successfully...</font></center>";
    } else {
        echo "<center><font color='red'>...not successfully...</font></center>";
    }
}

if (isset($_SESSION['r_id'])) {
    ?>
    <div id="h1">
        <?php
        $con = mysql_connect("localhost", "root", "root");
        $db = mysql_select_db("handloom_shopping_site", $con);
        session_start();

        $que = "SELECT * FROM bill";
        $result = mysql_query($que);

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

            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td>".$row['contactno']."</td>";
                echo "<td>".$row['total']."</td>";
                echo "<td><a href='index.php?page=view&b_id=".$row['b_id']."'>View</a>&nbsp;&nbsp;</td>";
                echo "<td><a href='index.php?page=shipping&b_id=".$row['b_id']."'>Shipping</a></td>";
                echo "<td><a href='action/d_purchase.php?b_id=".$row['b_id']."'><img src='image/33.png' height='20px'/></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</center>";
        } else {
            echo "<center>Unable to retrieve data: " . mysql_error() . "</center>";
        }
        mysql_close($con);
        ?>
    </div>
    <?php
} else {
    echo "<center>URL not Found</center>";
}
?>
