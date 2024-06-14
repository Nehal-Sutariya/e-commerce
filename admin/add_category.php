<?php
include("action/connection.php");

$query = "SELECT * FROM category";
$result = mysql_query($query, $con);

?>

<div>
    <form action="action/addcategory.php" method="post" name="category1">
        <center>
            <table align="center" border="2" bgcolor="#AAD4F7">
                <tr>
                    <th colspan="3"><h2><font face='Brush Script MT' color='black' size='8'>Category</font></h2></th>
                </tr>
                <tr>
                    <td align="right" colspan="3">
                        <a href="index.php?page=addcategory">
                            <img src='images/add.png' height='30px' width='30px' align='right'>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><b><h3>Sr No</h3></b></td>
                    <td><b><h3>Category</h3></b></td>
                    <td><b><h3>Action</h3></b></td>
                </tr>

                <?php
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['c_id'] . "</td>";
                    echo "<td>" . $row['c_name'] . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?page=addcategory&c_id=" . $row['c_id'] . "'><img src='images/edit.png' height='40px' width='40px' align='right'></a>";
                    echo "<a href='action/deletecate.php?c_id=" . $row['c_id'] . "'><img src='images/delete.png' height='40px' width='40px' align='right'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                mysql_close($con);
                ?>

            </table>
        </center>
    </form>
</div>

