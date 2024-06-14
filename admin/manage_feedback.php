<?php
include("action/connection.php");

$query = "SELECT * FROM feedback";
$result = mysql_query($query, $con);

?>

<div>
    <center>
        <a href='index.php?page=home'><img src='images/home.jpg' align='center' height='50px' width='30px'></a>
        <table border='2' align='center' bgcolor='#AAD4F7'>
            <tr>
                <th colspan='2'><h2><font face='jokerman' color='#005E8A' size='8'>View Feedback</font></h2></th>
            </tr>
            <tr>
                <td><h4>Feedback</h4></td>
                <td><h4>Action</h4></td>
            </tr>

            <?php
            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['feedback'] . "</td>";
                echo "<td><a href='action/deletefeedback.php?f_id=" . $row['f_id'] . "'><img src='images/delete.png' height='25px' width='40px' align='right' onclick='return check();'></a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    </center>
</div>

<script type="text/javascript" language="javascript">
    function check() {
        return confirm("Are you sure you want to delete?");
    }
</script>

<?php
mysql_close($con);
?>

