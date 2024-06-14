<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style.css" type="text/css"/>
    <script type="text/javascript">
        function check_valid() {
            var NameRegx = /^[A-Za-z]{1,15}$/;
            var NoRegx = /^\d{10}$/;
            
            var b_name = document.frmregister.b_name.value;
            var b_address = document.frmregister.b_address.value;
            var b_city = document.frmregister.b_city.value;
            var b_contactno = document.frmregister.b_contactno.value;
            
            if (b_name == "") {
                alert("Enter your username");
                document.frmregister.b_name.focus();
                return false;
            } else if (!NameRegx.test(b_name)) {
                alert("Enter only characters in username...");
                document.frmregister.b_name.focus();
                return false;
            }
            
            if (b_address == "") {
                alert("Enter your address..");
                document.frmregister.b_address.focus();
                return false;
            }
            
            if (b_city == "") {
                alert("Enter your city..");
                document.frmregister.b_city.focus();
                return false;
            } else if (!NameRegx.test(b_city)) {
                alert("Enter only characters in city...");
                document.frmregister.b_city.focus();
                return false;
            }
            
            if (b_contactno == "") {
                alert("Enter your contact number..");
                document.frmregister.b_contactno.focus();
                return false;
            } else if (!NoRegx.test(b_contactno)) {
                alert("Enter only digits in contact number...");
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
            <h3><font face="Brush Script MT" color="#005E8A" size="8">Shopping Detail</font></h3>
            <table class="table" align="center" border="2" bgcolor="#90D7F3">
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
            <?php
            // Assuming you want to pass the total as a hidden field to the action
            echo "<input type='hidden' name='b_total' value='" . $_REQUEST['total'] . "'>";
            ?>
        </center>
    </form>
</body>
</html>
