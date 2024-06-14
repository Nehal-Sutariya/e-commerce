<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
        }
        table {
            border: 8px solid lightgrey;
            background-color: lightgrey;
            margin: 20px auto;
            padding: 20px;
        }
        th {
            text-align: center;
        }
        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div>
        <form action="action/feedback_insert.php" method="post">
            <center>
                <table>
                    <tr>
                        <th colspan="2">
                            <h2 style="font-family: 'Brush Script MT'; color: black; font-size: 48px;">Feedback</h2>
                        </th>
                    </tr>
                    <?php
                    if (isset($_REQUEST['msg'])) {
                        if ($_REQUEST['msg'] == 1) {
                            echo "<tr><td colspan='2' style='color: green;'>Feedback has been sent successfully.</td></tr>";
                        } else {
                            echo "<tr><td colspan='2' style='color: red;'>Feedback was not sent successfully.</td></tr>";
                        }
                    }
                    ?>
                    <tr>
                        <td><b>Feedback</b></td>
                        <td><textarea rows="3" cols="25" name="feedback" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" class="button">
                            <input type="reset" value="Cancel" name="reset" class="button">
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </div>
</body>
</html>

<?php
include("action/connection.php");

$query = "SELECT * FROM u_name";
$res = mysqli_query($con, $query); // Use mysqli_query for MySQLi
?>

