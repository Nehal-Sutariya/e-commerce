<?php
require_once("action/connection.php");

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="style/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <div id="wrapper">
        <div id="header" align="center">
            <div class="float left">
                <img src="E:\vrunda\uWamp\www\handloom_shopping_site\images\logo.jpg" height="60px" width="95px" align='left'/>
            </div>
            <font face="cooper" align="center" color="black" size="32" class="title">leathershop</font>
            <div class="login" id="login">
                <?php
                session_start();
                if (isset($_SESSION['r_id'])) {
                    echo "<h6><a href='index.php?page=logout'><img src='E:\nehal Wamp\www\leathershop\images\lo.jpg' height='50px' width='50px' class='logout'/></a></h6>";
                    echo "<h6 align='right'><font color='#B23263'>Welcome...".$_SESSION['username']."</font></h6>";
                    if ($_SESSION['utype'] == 1) {
                        echo "<h6 align='right'><font size='3'><a href='index.php?page=change_pass' class='float right'>Change Password</a></font></h6>";
                    }
                    echo "<br>";
                    if ($_SESSION['utype'] == 0) {
                        $que = "select from addtocart where r_id=".$_SESSION['r_id'];
                        $res = mysql_query($que, $con);
                        $row = mysql_num_rows($res);
                        echo "<a href='index.php?page=addtocart'><font size='5px'>$row</font><img src='E:\nehal Wamp\www\leather\images\ac.jpg' height='30px' width='30px'></a>";
                        echo "<br>";
                    }
                } else {
                    echo "<a href='index.php?page=login'><img src='E:\vrundau Wamp\www\handloom_shopping_site\images\lo2.jpg' height='50px' width='50px' align='right'/></a>";
                }
                ?>
            </div>
        </div>

        <div id="menu">
            <div id="item">
                <a href="index.php?page=home"><i>Home</i></a>
                <?php
                if (isset($_SESSION['r_id'])) {
                    if ($_SESSION['utype'] == 0) {
                        echo '<a href="index.php?page=aboutus"><i>About Us</i></a>';
                        echo '<a href="index.php?page=contactus"><i>Contact Us</i></a>';
                        echo '<a href="index.php?page=feedback"><i>Feedback</i></a>';
                        echo '<a href="index.php?page=product"><i>Gallery</i></a>';
                    } else {
                        echo '<a href="index.php?page=viewregister"><i>View Register</i></a>';
                        echo '<a href="index.php?page=Category"><i>Category</i></a>';
                        echo '<a href="index.php?page=manage_feedback"><i>View Feedback</i></a>';
                        echo '<a href="index.php?page=viewproduct"><i>View Product</i></a>';
                        echo '<a href="index.php?page=view_purchase"><i>View Purchase</i></a>';
                    }
                }
                ?>
            </div>
        </div>

        <div id="content">
            <!-- Content will be dynamically loaded here based on the 'page' variable -->
        </div>
    </div>
</body>
</html>
