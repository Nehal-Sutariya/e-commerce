<?php
session_start();

// Check if user is logged in
if (isset($_SESSION["_id"])) {
    // Connect to the database
    $con = new mysqli("localhost", "root", "root", "handloom_shopping_site");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Get the user's cart items
    $query = "SELECT * FROM addtocart WHERE r_id=" . $_SESSION['r_id'];
    $result = $con->query($query);
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
                $total = 0;

                while ($row = $result->fetch_assoc()) {
                    // Get product details
                    $query1 = "SELECT * FROM product WHERE p_id=" . $row['p_id'];
                    $result1 = $con->query($query1);
                    while ($row1 = $result1->fetch_assoc()) {
                        $subtotal = $row['stock'] * $row1['price'];
                        $total += $subtotal;
                        echo "<tr>";
                        echo "<td><img src='upload/" . $row1['image'] . "' height='70px' width='70px'></td>";
                        echo "<td>" . $row1['p_name'] . "</td>";
                        echo "<td align='center'>" . $row['stock'] . "</td>";
                        echo "<td>" . $row1['price'] . "</td>";
                        echo "<td>" . $subtotal . "</td>";
                        echo "<td><a href='action/update_cart.php?p_id=" . $row['p_id'] . "'><img src='image/update10.jpg' height='22px' width='22px'></a></td>";
                        echo "<td><a href='action/delete_cart.php?p_id=" . $row['p_id'] . "'><img src='image/delete.png' height='30px' width='50px'></a></td>";
                        echo "</tr>";
                    }
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
    $con->close();
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
        var NoRegex = /^\d{1,10}$/;

        if (p_name === "") {
            alert("Enter the product name.");
            document.frmaddtocard.p_name.focus();
            return false;
        } else if (!NameRegex.test(p_name)) {
            alert("Enter only characters in the product name.");
            document.frmaddtocard.p_name.focus();
            return false;
        }

        if (p_price === "") {
            alert("Enter the product price.");
            document.frmaddtocard.p_price.focus();
            return false;
        } else if (!NoRegex.test(p_price)) {
            alert("Enter only digits in the product price.");
            document.frmaddtocard.p_price.focus();
            return false;
        }

        if (p_quantity === "") {
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
