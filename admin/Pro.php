<?php

require_once('action/connection.php');

$query = "SELECT * FROM category";
$res = mysql_query($query, $con) or die("Connection error: " . mysql_error());

echo '<div id="content" class="leftside float_left">';
echo '<p><a href="index.php?page=product&c_id=all">All</a></p>';
echo '<ul>';

while ($row = mysql_fetch_array($res)) {
    echo '<li><a href="index.php?page=product&c_id=' . $row['id'] . '">' . ucwords($row['e_name']) . '</a></li>';
}

echo '</ul>';
echo '</div>';

$query = "SELECT * FROM product";
$res = mysql_query($query, $con) or die("Query error: " . mysql_error());

echo '<div id="product_list">';
echo '<table border="1">';
echo '<tr><th>Name</th><th>Price</th><th>Action</th></tr>';

while ($row = mysql_fetch_array($res)) {
    echo '<tr>';
    echo '<td><a href="index.php?page=viewitem&p_id=' . $row['p_id'] . '"><img src="upload/' . $row['image'] . '" height="120px" width="150px" align="center">' . ucwords($row['p_name']) . '</a></td>';
    echo '<td align="center">' . $row['price'] . '</td>';
    echo '<td><h4><a href="index.php?page=itemDetail&p_id=' . $row['p_id'] . '">View</a></h4></td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';

?>

<div id="center">
    <img src="image/007.gif" height="300px"><br>
    <font id="rewrite">But You Can't Rewrite Url...</font>
</div>
