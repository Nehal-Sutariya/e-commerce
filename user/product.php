<?php
session_start(); // Start session if not already started
include("action/connection.php");

// Check if session variable 'r_id' is set, assuming it is for user authentication
if (isset($_SESSION["r_id"])) {
?>

<div id="content_leftside" class="float_left">
    <?php
    require_once("action/connection.php");
    $query = "SELECT * FROM category";
    $result = mysql_query($query, $con) or die("Connection error: " . mysql_error());
    ?>

    <div id="content_leftsideth">
        <form>
            <table>
                <th>Category</th>
                <?php
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr><td><a href='index.php?page=product&c_id=" . $row['c_id'] . "'>" . ucwords($row['c_name']) . "</a><br></td></tr>";
                }
                ?>
            </table>
        </form>
    </div>
</div>

<div id="float_left">
    <?php
    if (isset($_REQUEST['c_id'])) {
        $query = "SELECT * FROM product WHERE c_id=" . $_REQUEST['c_id'];
        $result = mysql_query($query, $con);
        $i = 0;
        echo "<table border='3'>";
        echo "<tr>";
        while ($row = mysql_fetch_array($result)) {
            echo "<td>";
            echo "<table>";
            echo "<tr>";
            echo "<td><a href='index.php?page=viewitems&p_id=" . $row['p_id'] . "'><img src='upload/" . $row['image'] . "' height='120px' width='150px'></a></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='center'><font size='5px'>" . ucwords($row['p_name']) . "</font></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='center'>Price: <img src='image/113.jpg' height='15px' width='15px'> <font size='5px'>" . $row['price'] . "</font></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='center'><h4><a href='index.php?page=itemDetail&p_id=" . $row['p_id'] . "'>View</a></h4></td>";
            echo "</tr>";
            echo "</table>";
            echo "</td>";
            $i++;
            if ($i % 4 == 0)
                echo "</tr><tr>";
        }
        echo "</tr></table>";
    } else {
        echo "</tr>";
        echo "</table>";
    }
    ?>
    <center><img src="image/007.gif" height="300px"><br><font id="rewrite">But You Can't Rewrite URL...</font></center>
</div>

<?php
} else {
    echo "You are not authorized to view this page.";
}
?>
