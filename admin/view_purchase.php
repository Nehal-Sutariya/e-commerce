<?php
if(isset($_REQUEST['msg'])) {
    if($_REQUEST['msg'] == 1) {
        echo "<center><font color='blue'>...shipping has been sent successfully...</font></center>";
    } else {
        echo "Shipping not successful.";
    }
}
?>

<?php
if(isset($_SESSION['r_id'])) {
    include("action/connection.php");
    session_start();
    
    $query = "SELECT * FROM bill";
    $result = mysql_query($query, $con);
    
    if($result) {
        echo "<div id='h_1'>";
        echo "<center>";
        echo "<font face='Brush Script MT' color='#005E8A' size='8'><h3>View Purchase</h3></font>";
        echo "<table border='1' align='center' bgcolor='#AAD4F7'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Address</th>";
        echo "<th>City</th>";
        echo "<th>Contact No</th>";
        echo "<th>Total</th>";
        echo "<th colspan='3'>Action</th>";
        echo "</tr>";
        
        while($row = mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['contactno']."</td>";
            echo "<td>".$row['b1_total']."</td>";
            echo "<td><a href='index.php?page=view&b_id=".$row['b_id']."'>View</a>&nbsp;&nbsp;</td>";
            echo "<td><a href='index.php?page=shipping&b_id=".$row['b_id']."'>Shipping</a></td>";
            echo "<td><a href='action/d_purchase.php?h_id=".$row['b_id']."'><img src='image/33.png' height='20px'/></a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "</center>";
        echo "</div>";
    } else {
        echo mysql_error();
    }
} else {
    echo "URL not found.";
}
?>
