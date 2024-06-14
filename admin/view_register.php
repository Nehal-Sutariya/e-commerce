<?php
include("action/connection.php");

$query = "SELECT * FROM registration";
$result = mysql_query($query);

if ($result) {
    echo "<div>";
    echo "<center>";
    echo "<a href='index.php?page=home'><img src='image/home.jpg' align='center' height='50px' width='30px'></a>";
    echo "<table border='2' align='center' bgcolor='#AAD4F7'>";
    echo "<tr>";
    echo "<th colspan='9'><h2><font face='jokerman' color='#005E8A' size='8'>View Register</font></h2></th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><h3><b>Firstname</b></h3></td>";
    echo "<td><h3><b>Lastname</b></h3></td>";
    echo "<td><h3><b>Address</b></h3></td>";
    echo "<td><h3><b>City</b></h3></td>";
    echo "<td><h3><b>Gender</b></h3></td>";
    echo "<td><h3><b>ContactNo</b></h3></td>";
    echo "<td><h3><b>Email-Id</b></h3></td>";
    echo "<td><h3><b>Username</b></h3></td>";
    echo "<td><h3><b>Password</b></h3></td>";
    echo "<td><h3><b>Action</b></h3></td>";
    echo "</tr>";

    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['firstname']."</td>";
        echo "<td>".$row['lastname']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['city']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['contactno']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td><a href='action/deletereg.php?r_id=".$row['r_id']."'><img src='image/n.png' height='40px' width='60px' align='right'></a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</center>";
    echo "</div>";
} else {
    echo mysql_error();
}
?>
