<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopping Detail</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        .label {
            margin: 20px auto;
            border: 1px solid #90D7F3;
            background-color: #90D7F3;
            padding: 20px;
        }
        .label td {
            padding: 10px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript">
        function check_valid() {
            var NameRegex = /^[A-Za-z]+$/;
            var NoRegex = /^[0-9]+$/;

            var b_name = document.forms["frmregister"]["b_name"].value.trim();
            var b_address = document.forms["frmregister"]["b_address"].value.trim();
            var b_city = document.forms["frmregister"]["b_city"].value.trim();
            var b_contactno = document.forms["frmregister"]["b_contactno"].value.trim();

            if (b_name === "") {
                alert("Enter your name.");
                document.forms["frmregister"]["b_name"].focus();
                return false;
            } else if (!NameRegex.test(b_name)) {
                alert("Enter only characters in the name.");
                document.forms["frmregister"]["b_name"].focus();
                return false;
            }

            if (b_address === "") {
                alert("Enter your address.");
                document.forms["frmregister"]["b_address"].focus();
                return false;
            }

            if (b_city === "") {
                alert("Enter your city.");
                document.forms["frmregister"]["b_city"].focus();
                return false;
            } else if (!NameRegex.test(b_city)) {
                alert("Enter only characters in the city.");
                document.forms["frmregister"]["b_city"].focus();
                return false;
            }

            if (b_contactno === "") {
                alert("Enter your contact number.");
                document.forms["frmregister"]["b_contactno"].focus();
                return false;
            } else if (!NoRegex.test(b_contactno)) {
                alert("Enter only numbers in the contact number.");
                document.forms["frmregister"]["b_contactno"].focus();
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <form action="action/insert_bill.php" method="POST" name="frmregister" onsubmit="return check_valid()">
        <div class="label">
            <font face="Brush Script MT" color="#2005EA" size="8"><h3>Shopping Detail</h3></font>
            <table align="center" border="1" bgcolor="#90D7F3">
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
                        <input type="hidden" name="b_total" value="<?php echo htmlspecialchars($_REQUEST['total']); ?>">
                        <input type="submit" value="OK" name="btnsubmit" class="button">
                        <input type="reset" value="Reset" name="btnreset" class="button">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
