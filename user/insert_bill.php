<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Detail</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            margin: 20px auto;
            border: 2px solid #90D7F3;
            background-color: #90D7F3;
            padding: 20px;
        }
        .textbox {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript">
        function check_valid() {
            var NameRegx = /^[A-Za-z]{1,15}$/;
            var NoRegx = /^\d{10}$/;
            
            var b_name = document.forms["frmregister"]["b_name"].value;
            var b_address = document.forms["frmregister"]["b_address"].value;
            var b_city = document.forms["frmregister"]["b_city"].value;
            var b_contactno = document.forms["frmregister"]["b_contactno"].value;
            
            if (b_name === "") {
                alert("Enter your name");
                document.forms["frmregister"]["b_name"].focus();
                return false;
            } else if (!NameRegx.test(b_name)) {
                alert("Enter only letters (up to 15 characters) in name");
                document.forms["frmregister"]["b_name"].focus();
                return false;
            }
            
            if (b_address === "") {
                alert("Enter your address");
                document.forms["frmregister"]["b_address"].focus();
                return false;
            }
            
            if (b_city === "") {
                alert("Enter your city");
                document.forms["frmregister"]["b_city"].focus();
                return false;
            } else if (!NameRegx.test(b_city)) {
                alert("Enter only letters (up to 15 characters) in city");
                document.forms["frmregister"]["b_city"].focus();
                return false;
            }
            
            if (b_contactno === "") {
                alert("Enter your contact number");
                document.forms["frmregister"]["b_contactno"].focus();
                return false;
            } else if (!NoRegx.test(b_contactno)) {
                alert("Enter 10 digits in contact number");
                document.forms["frmregister"]["b_contactno"].focus();
                return false;
            }
            
            return true;
        }
    </script>
</head>
<body>
    <form action="action/insert_bill.php" method="POST" name="frmregister" onsubmit="return check_valid();">
        <center>
            <h3><font face="Brush Script MT" color="#005E8A" size="8">Shopping Detail</font></h3>
            <table class="table">
                <tr>
                    <td><b>Name</b></td>
                    <td><input type="text" name="b_name" class="textbox" required></td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td><input type="text" name="b_address" class="textbox" required></td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td><input type="text" name="b_city" class="textbox" required></td>
                </tr>
                <tr>
                    <td><b>Contact No</b></td>
                    <td><input type="text" name="b_contactno" class="textbox" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="OK" name="birisubmit" class="button">
                        <input type="reset" value="Reset" name="btnreset" class="button">
                    </td>
                </tr>
            </table>
            <!-- Assuming you want to pass the total as a hidden field to the action -->
            <input type="hidden" name="b_total" value="<?php echo htmlspecialchars($_REQUEST['total']); ?>">
        </center>
    </form>
</body>
</html>
