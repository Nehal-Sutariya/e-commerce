<?php
if(isset($_SESSION["r_id"])) {
    include("action/connection.php");

    $editmode = false;
    if(isset($_REQUEST['p_id'])) {
        $query = "SELECT * FROM product WHERE p_id=" . $_REQUEST['p_id'];
        $result = mysql_query($query, $con);
        $row = mysql_fetch_array($result);
        $catid = $row['c_id'];
        $editmode = true;
    }
    ?>

    <form action="action/Pro.php" method="POST" name="frmadditem" onsubmit="return check_valid();" enctype="multipart/form-data">
        <?php if(isset($_REQUEST["p_id"])): ?>
            <input type='hidden' name='p_id' value="<?php echo $_REQUEST['p_id']; ?>">
        <?php endif; ?>

        <center>
            <h3><font face='Brush Script MT' color='#005E8A' size='8'>Add Product</font></h3>
            <table border="6" align="center" class="table" width="500" bgcolor='#AAD4F7'>
                <tr>
                    <td><b>Category:</b></td>
                    <td>
                        <select name="c_id" class="textbox">
                            <?php
                            $sql = "SELECT * FROM category";
                            $res = mysql_query($sql, $con);
                            while ($row = mysql_fetch_array($res)) {
                                if ($row['c_id'] == $catid) {
                                    echo "<option selected value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Product Name:</b></td>
                    <td><input type="text" name="p_name" placeholder="ItemName" class="textbox" value="<?php if ($editmode) echo $row['p_name']; ?>"></td>
                </tr>
                <tr>
                    <td><b>Price:</b></td>
                    <td><input type="text" name="price" placeholder="Price" class="textbox" value="<?php if ($editmode) echo $row['price']; ?>"></td>
                </tr>
                <tr>
                    <td><b>Image:</b></td>
                    <td>
                        <input type="file" name="file" class="textbox">
                        <?php if ($editmode) echo "<img src='images/" . $row['image'] . "' height='80px' width='80px'>"; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Description:</b></td>
                    <td><input type="text" name="descr" placeholder="Detail" class="textbox" value="<?php if ($editmode) echo $row['descr']; ?>"></td>
                </tr>
                <tr>
                    <td><b>Stock:</b></td>
                    <td><input type="text" name="stock" placeholder="Stock" class="textbox" value="<?php if ($editmode) echo $row['stock']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnchange" value="<?php echo $editmode ? 'Update' : 'Add'; ?>" class="button">
                        <input type="reset" value="Reset" name="btnreset" class="button">
                    </td>
                </tr>
            </table>
        </center>
    </form>

    <center>
        <img src='images/other/7.gif' height='300px'><br>
        <font id='rewrite'>But You Can't Rewrite URL...</font>
    </center>

    <?php
} else {
    echo "<center><img src='images/fo2.jpg' height='300px'><br><font id='rewrite'>But You Can't Rewrite URL...</font></center>";
}
?>
