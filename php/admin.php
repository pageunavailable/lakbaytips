<?php
    include('db_connect.php');
    $adm_lgn = "../html/admin_page.php";
    include($adm_lgn);

    if(isset($_POST['adm_sbt'])){
        $lgn_user = $_POST['adm_usr'];
        $lgn_pass = $_POST['adm_psw'];
        $password = hash("sha256",$lgn_pass);

        $stmt = $db->prepare("SELECT lt_admin_id FROM lt_admin_acc WHERE lt_acc_usr = ? AND lt_acc_psw = ?");
	    $stmt->execute([$lgn_user, $password]);
		$result = $stmt->fetch();  
        $col = $result['lt_acc_id'];
	    if($result){
			echo "<script>alert($col)</script>";  
			$_SESSION['accid'] = $col;
			header("Location: home.php");
        }
        else{
            echo '<script>alert("Invalid Account!")</script>';
        }
    }

?>