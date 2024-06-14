<?php

include("connection.php");

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    $query = "SELECT * FROM registration WHERE unm='$username' AND pass='$password'";
    $result = mysql_query($query);
    
    if ($result && mysql_num_rows($result) > 0) {
        $row = mysql_fetch_array($result);
        
        $_SESSION['username'] = $row['unm'];
        $_SESSION['r_id'] = $row['r_id'];
        $_SESSION['utype'] = $row['utype'];
        
        header("location: ../index.php?page=home&msg=1");
        exit();
    } else {
        header("location: ../index.php?page=login&msg=0");
        exit();
    }
} else {
    echo "Invalid request.";
}

?>
