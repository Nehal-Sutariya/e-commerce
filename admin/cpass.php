<?php

include("connection.php");

$pass1 = $_REQUEST['oldpass'];
$pass2 = $_REQUEST['newpass'];
$pass3 = $_REQUEST['confipass'];

if(isset($pass1) && isset($pass2) && isset($pass3)) {
    $r_id = $_SESSION['r_id'];
    
    $query = "SELECT * FROM registration WHERE r_id='$r_id'";
    $res = mysql_query($query, $con);
    
    if(mysql_num_rows($res) > 0) {
        $row = mysql_fetch_array($res);
        $current_pass = $row['pass'];
        
        if($pass2 == $pass3) {
            if($pass1 == $current_pass) {
                $quel = "UPDATE registration SET pass='$pass2' WHERE r_id='$r_id'";
                $result = mysql_query($quel, $con);
                
                if($result) {
                    header("location: ../index.php?page=changepass&msg=0");
                    exit();
                } else {
                    echo "Failed to update password.";
                    header("location: ../index.php?page=changepass&msg=1");
                    exit();
                }
            } else {
                echo "Incorrect old password.";
                header("location: ../index.php?page=changepass&msg=2");
                exit();
            }
        } else {
            echo "New password and confirm password do not match.";
            header("location: ../index.php?page=changepass&msg=3");
            exit();
        }
    } else {
        echo "User not found.";
        header("location: ../index.php?page=changepass&msg=4");
        exit();
    }
} else {
    echo "Please fill all fields.";
    header("location: ../index.php?page=changepass&msg=5");
    exit();
}

?>
