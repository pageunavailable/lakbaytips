<?php
	session_start();
	include('db_connect.php');
	if(isset($_SESSION['accid'])){
		header("Location: home.php");
	}

    $landing = "../html/landing_page.php";
    include($landing);

    if(isset($_POST['Login'])){
        $lgn_user = $_POST['lgn_usr'];
        $lgn_pass = $_POST['lgn_psw'];
        $password = hash("sha256",$lgn_pass);

        $stmt = $db->prepare("SELECT lt_acc_id FROM lt_usr_acc WHERE lt_acc_usrnm = ? AND lt_acc_psw = ?");
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

	if(isset($_POST['Signup'])){
		$sgn_fname = $_POST['fname'];
		$sgn_lname = $_POST['lname'];
		$sgn_usr = $_POST['sgn_usr'];
		$sgn_eml = $_POST['sgn_eml'];
		$sgn_pass = $_POST['sgn_psw'];
		$sgn_psw_hash = hash("sha256",$sgn_pass);
		$sgn_conf_pass = $_POST['sgn_conf_psw'];
		$cond_ctr = 0;
		if(strlen($sgn_usr) > 7){
			$stmt = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_usrnm = ?");
			$stmt->execute([$sgn_usr]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt2 = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_eml = ?");
			$stmt2->execute([$sgn_eml]);
			$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

			if($result){
				echo '<script>alert("This Username has been taken! Please choose another.")</script>';
			}
			else if($result2){
				echo '<script>alert("This Email has been taken! Please choose another.")</script>';
			}
			else{
				$stmt = $db->prepare("INSERT INTO lt_usr_acc (lt_acc_usrnm, lt_acc_psw, lt_acc_eml, lt_acc_fn, lt_acc_ln) VALUES(?,?,?,?,?)");
				$result = $stmt->execute([$sgn_usr, $sgn_psw_hash, $sgn_eml, $sgn_fname, $sgn_lname]);
				echo '<script>alert("Account Registered!")</script>';
			}
		}
		else{
		}
	}
?>