<?php
session_start();

if(isset($_SESSION['r_id'])) {
    $con = mysql_connect("localhost", "root", "root");
    $db = mysql_select_db("handloom_shopping_site", $con);

    if(isset($_REQUEST['bl_id'])) {
        $bill1 = "SELECT * FROM billl WHERE bl_id = ".$_REQUEST['bl_id'];
        $res = mysql_query($bill1, $con);
        $row = mysql_fetch_array($res);
        $bl_id = $row[0];

        $bill2 = "SELECT * FROM bill2 WHERE bl_id = $bl_id";
        $res1 = mysql_query($bill2, $con);

        $user = "SELECT * FROM registration WHERE r_id = ".$row['r_id'];
        $res3 = mysql_query($user, $con);
        $row3 = mysql_fetch_array($res3);
        $name = $row3['name'];
?>
        <div>
            <center><font face='Brush Script MT' color='#005E8A' size='8'><h3>Product</h3></font></center>
            <table border='4' bgcolor='#AAD4F7'>
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
<?php
        $total = 0;
        $i = 1;

        while($row1 = mysql_fetch_array($res1)) {
            $id = $row1['p_id'];
            $pro = "SELECT * FROM product WHERE p_id = $id";
            $res2 = mysql_query($pro, $con);
            $row2 = mysql_fetch_array($res2);

            echo "<tr>";
            echo "<td align='center'>".$i."</td>";
            echo "<td>".$row2['p_name']."</td>";
            echo "<td><img src='upload/".$row2['image']."' height='100px' width='100px'></td>";
            echo "<td>".$row2['price']."</td>";
            echo "<td align='center'>".$row1['quantity']."</td>";

            $subtotal = $row1['quantity'] * $row2['price'];
            echo "<td>".$subtotal."</td>";
            echo "</tr>";

            $total += $subtotal;
            $i++;
        }

        echo "<tr>";
        echo "<td align='right' colspan='5'><font color='green' size='5px'><b>Total</b>&nbsp;&nbsp;</font></td>";
        echo "<td><font color='blue' size='5px'>$total</font></td>";
        echo "</tr>";
?>
            </table>
            <a href="index.php?page=view_purchase">Back</a>
        </div>
<?php
    } else {
        echo "URL not found";
    }
} else {
    echo "Session ID not set";
}
?>

