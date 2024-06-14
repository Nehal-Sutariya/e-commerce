<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style.css" type="text/css"/>
    <script type="text/javascript">
        function check_valid() {
            var NameRegx = /^[A-Za-z]+$/;
            var NoRegx = /^[0-9]+$/;

            var b_name = document.frmregister.b_name.value;
            var b_address = document.frmregister.b_address.value;
            var b_city = document.frmregister.b_city.value;
            var b_contactno = document.frmregister.b_contactno.value;

            if (b_name == "") {
                alert("Enter your name.");
                document.frmregister.b_name.focus();
                return false;
            } else if (!NameRegx.test(b_name)) {
                alert("Enter only characters in the name.");
                document.frmregister.b_name.focus();
                return false;
            }

            if (b_address == "") {
                alert("Enter your address.");
                document.frmregister.b_address.focus();
                return false;
            }

            if (b_city == "") {
                alert("Enter your city.");
                document.frmregister.b_city.focus();
                return false;
            } else if (!NameRegx.test(b_city)) {
                alert("Enter only characters in the city.");
                document.frmregister.b_city.focus();
                return false;
            }

            if (b_contactno == "") {
                alert("Enter your contact number.");
                document.frmregister.b_contactno.focus();
                return false;
            } else if (!NoRegx.test(b_contactno)) {
                alert("Enter only numbers in the contact number.");
                document.frmregister.b_contactno.focus();
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <form action="action/insert_bill.php" method="POST" name="frmregister" onsubmit="return check_valid();">
        <center>
            <font face="Brush Script MT" color="#2005EA" size="8"><h3>Shopping Detail</h3></font>
            <table class="label" align="center" border="1" bgcolor="#90D7F3">
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
                        <input type="hidden" name="b_total" value="<?php echo $_REQUEST['total']; ?>">
                        <input type="submit" value="OK" name="btnsubmit" class="button">
                        <input type="reset" value="Reset" name="btnreset" class="button">
                    </td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>
