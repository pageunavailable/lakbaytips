<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $landing = "../html/landing_page.php";
    include($landing);
    if(isset($_POST['Login'])){
        $lgn_user = $_POST['lgn_usr'];
        $lgn_pass = $_POST['lgn_psw'];
        $password = hash("sha256",$lgn_pass);
        
    }
?>