<?php
include("action/connection.php");

$query = "SELECT * FROM category";
$result = mysql_query($query);

echo "<div>";
echo "<form action='action/addcategory.php' method='post' name='category1'>";
echo "<center>";
echo "<h4><b><font face='Brush Script MT' color='black' size='8'>Category</font></b></h4>";
echo "<table align='center' border='2' bgcolor='#AAD4F7'>";
echo "<tr>";
echo "<td align='right' colspan='5'><a href='index.php?page=addcategory'><img src='images/add.png' height='30px' width='30px' align='right'></a></td>";
echo "</tr>";
echo "<tr>";
echo "<th><h3>Category ID</h3></th>";
echo "<th><h3>Category Name</h3></th>";
echo "<th colspan='2'><h3><b>Action</b></h3></th>";
echo "</tr>";

while ($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['c_id']."</td>";
    echo "<td>".$row['c_name']."</td>";
    echo "<td><a href='index.php?page=addcategory&c_id=".$row['c_id']."'><img src='images/edit.png' height='40px' width='40px' align='right'></a></td>";
    echo "<td><a href='action/deletecate.php?c_id=".$row['c_id']."'><img src='images/delete.png' height='40px' width='40px' align='right'></a></td>";
    echo "</tr>";
}

echo "</table>";
echo "</center>";
echo "</form>";
echo "</div>";

mysql_close($con);
?>
