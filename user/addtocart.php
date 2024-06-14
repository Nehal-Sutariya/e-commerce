<?php
session_start();

if (isset($_SESSION["_id"])) {
    $con = mysql_connect("localhost", "root", "root");
    $db = mysql_select_db("handloom_shopping site", $con);

    $query = "SELECT * FROM addtocart WHERE r_id=" . $_SESSION['r_id'];
    $result = mysql_query($query, $con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <div>
        <center>
            <font face='Brush Script MT' color='black' size='7'><h3>Shopping Cart</h3></font>
            <table align="center" class="table" border="2" bgcolor="skyblue">
                <tr>
                    <td><b>Image</b></td>
                    <td><b>Name</b></td>
                    <td><b>Quantity</b></td>
                    <td><b>Price</b></td>
                    <td><b>Total</b></td>
                    <td colspan="2"><b>Action</b></td>
                </tr>

                <?php
                $p_id = 24;
                $total = 0;

                while ($row = mysql_fetch_array($result)) {
                    $query1 = "SELECT * FROM product WHERE p_id=" . $row['p_id'];
                    $result1 = mysql_query($query1, $con);
                    while ($row1 = mysql_fetch_array($result1)) {
                        echo "<tr>";
                        echo "<td><img src='upload/" . $row1['image'] . "' height='70px' width='70px'></td>";
                        echo "<td>" . $row1['p_name'] . "</td>";
                        echo "<td align='center'>" . $row['stock'] . "</td>";
                        echo "<td>" . $row1['price'] . "</td>";

                        $total = $row['stock'] * $row1['price'];
                        echo "<td>" . $total . "</td>";

                        echo "<td><a href='action/update_cart.php?p_id=" . $row['p_id'] . "'><img src='image/update10.jpg' height='22px' width='22px'></a></td>";
                        echo "<td><a href='action/delete_cart.php?p_id=" . $row['p_id'] . "'><img src='image/delete.png' height='30px' width='50px'></a></td>";
                        echo "</tr>";
                    }
                    $total += $total;
                    $p_id++;
                }

                echo "<tr>";
                echo "<td align='right' colspan='5'><font color='#A11319' size='5pt'>Total &nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
                echo "<td><font color='green' size='5pt'>$total</font></td>";
                echo "</tr>";

                ?>
                <tr>
                    <td colspan="7" align='center'>
                        <a href='index.php?page=product'><font color='blue' size='5pt'>Continue Shopping</font></a>
                        <a href='index.php?page=shoppingdetail&r_id=<?php echo $_SESSION['r_id']; ?>&total=<?php echo $total; ?>'><font color='blue' size='5pt'>Purchase >></font></a>
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>

</html>

<?php
} else {
    echo "<center><img src='image/007.gif' height='300px'><br><font id='rewrite'>But You cannot Rewrite URI...</font></center>";
}
?>

<script type="text/javascript">
    function check_valid() {
        var p_name = document.frmaddtocard.p_name.value;
        var p_price = document.frmaddtocard.p_price.value;
        var p_quantity = document.frmaddtocard.p_quantity.value;

        var NameRegex = /^[A-Za-z]{1,15}$/;
        var NoRegex = /^\d{10}$/;

        if (p_name == "") {
            alert("Enter the product name.");
            document.frmaddtocard.p_name.focus();
            return false;
        } else if (!NameRegex.test(p_name)) {
            alert("Enter only characters in the product name.");
            document.frmaddtocard.p_name.focus();
            return false;
        }

        if (p_price == "") {
            alert("Enter the product price.");
            document.frmaddtocard.p_price.focus();
            return false;
        } else if (!NoRegex.test(p_price)) {
            alert("Enter only digits in the product price.");
            document.frmaddtocard.p_price.focus();
            return false;
        }

        if (p_quantity == "") {
            alert("Enter the product quantity.");
            document.frmaddtocard.p_quantity.focus();
            return false;
        } else if (!NoRegex.test(p_quantity)) {
            alert("Enter only digits in the product quantity.");
            document.frmaddtocard.p_quantity.focus();
            return false;
        }

        return true;
    }
</script>
