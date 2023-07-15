<?php
	if(isset($_POST['Login'])){
        $lgn_user = $_POST['lgn_usr'];
        $lgn_pass = $_POST['lgn_psw'];
        $password = hash("sha256",$lgn_pass);

        $stmt = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_usrnm = ? AND lt_acc_psw = ?");
	    $stmt->execute([$lgn_user, $password]);
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        
	    if($result){
            echo '<script>alert("Account Found!")</script>';
        }
        else{
            echo '<script>alert("Invalid Account!")</script>';
        }
    }

	if(isset($_POST['Signup'])){
		$sgn_usr = $_POST['sgn_usr'];
		$sgn_eml = $_POST['sgn_eml'];
		$sgn_pass = $_POST['sgn_psw'];
		$sgn_conf_pass = $_POST['sgn_conf_psw'];
		$cond_ctr = 0;
		//if(strlen($sgn_usr) > 7){
			$stmt = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_usrnm = ?");
			$stmt->execute([$sgn_usr]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if($result){
				echo '<script>alert("This username has been taken! Please choose another.")</script>';
			}
			else{
				echo '<script>alert("Username available!")</script>';

			}
		/*}
		else{
			$cond_ctr++;
		}*/
	}

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width" initial-scale ="1.0">
		<title>Lakbay Tips</title>
		<link rel="stylesheet" type="text/css" href="../css/indexstyle.css">
		<script type="text/javascript " src="../js/landingtab_toggle.js"></script>
		<script type="text/javascript " src="../js/preventdefault.js"></script>
	</head>
	<body>
		<div class = "half1">
			<div class = "logo">
				<img src="../img/Lakbay_Tips_2.0 logo.png">
			</div>
			<div class = "desc">
				<p></p>
			</div>
		</div>
		<div class = "half2">
			<div class = "inputmodule">
				<div class = "tabs">
					<button id = "loginbtn" onclick="loginToggle()">
						Log In
					</button>
					<button id = "signupbtn" onclick="signupToggle()">
						Sign Up
					</button>
				</div>
					<div class = "login" id = "lgn">
						<form class = "lgnform" method = "POST" action="">
							<p class="frmfont">Log In</p>
							<input id = "usrlgn_txt" type = "text" placeholder="Username" name = "lgn_usr">
							<br>
							<input id = "pswlgn_txt" type = "password" placeholder="Password" name = "lgn_psw">
							<br>
							<input type = "submit" value = "Log In" name = "Login">
						</form>
					</div>
					<div class = "signup" id = "sgn">
						<form class = "sgnform" method = "POST" action="">
							<p class="frmfont">Sign Up</p>
							<input type = "text" placeholder="First Name" name = "fname"required>
							<input type = "text" placeholder="Last Name" name = "lname" required>
							<br>
							<input type = "text" placeholder="Username" name = "sgn_usr"required>
							<br>
							<span class = "error" id = "usrcharerror">* Must be 8 Characters Long</span>
							<br>
							<span class = "error" id = "">* Username already taken</span>
							<br>
							<span class = "verify" id = "">* Username available</span>
							<br>
							<input type = "email" placeholder="E-mail" name = "sgn_eml" required>
							<br>
							<input type = "password" placeholder="Password" name = "sgn_psw" required> 
							<br>
							<span class = "error" id = "pswcharerror">* Must be 8 Characters Long</span>
							<br>
							<span class = "error">* Must contain number</span>
							<br>
							<input type = "password" placeholder="Confirm Password" name = "sgn_conf_psw" required>
							<br>
							<span class = "error">* Password does not match</span>
							<br>
							<span class = "verify">* Password matched</span>
							<br>
							<input type = "submit" value="Sign Up" name = "Signup">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>