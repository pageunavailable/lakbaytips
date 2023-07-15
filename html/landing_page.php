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
		/*$sgn_usr = $_POST['sgn_usr'];
		$sgn_eml = $_POST['sgn_eml'];
		$sgn_pass = $_POST['sgn_psw'];
		$sgn_conf_pass = $_POST['sgn_conf_psw'];
		$cond_ctr = 0;
		if(strlen($sgn_usr) > 7){
			$stmt = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_usrnm = ?");
			$stmt->execute([$sgn_usr]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if($result){
				echo '<script>alert("This username has been taken! Please choose another.")</script>';
				echo '<script>document.getElementById("usrunv").style.display = "block"</script>';
				echo '<script>document.getElementById("usrave").style.display = "none"</script>';
			}
			else{
				echo '<script>alert("Username available!")</script>';
				echo '<script>document.getElementById("usrunv").style.display = "none"</script>';
				echo '<script>document.getElementById("usrave").style.display = "block"</script>';
			}
		}
		else{
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
		<script type="text/javascript " src="../js/landingtab_toggle.js"></script>
		<script type="text/javascript " src="../js/signupvalidation.js"></script>
		

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
						<form class = "sgnform" method = "POST" action="" onsubmit = "onSubmit()">
							<p class="frmfont">Sign Up</p>
							<input type = "text" id = "sgnfname"placeholder="First Name" name = "fname">
							<input type = "text" id = "sgnlname"placeholder="Last Name" name = "lname" >

							<span class = "error" id = "namereq">* Please Enter Full Name</span>
							<br>
							<input type = "text" id = "sgnusr" placeholder="Username" name = "sgn_usr">

							<span class = "error" id = "usrnullerror">* Required</span>
							<span class = "error" id = "usrcharerror">* Must be 8 Characters Long</span>
							<span class = "error" id = "usrunv">* Username already taken</span>
							<span class = "verify" id = "usrave">* Username available</span>
							<br>
							<input type = "email" id = "sgneml"placeholder="E-mail" name = "sgn_eml" >

							<span class = "error" id = "valeml">* Valid Email Required</span>
							<br>	
							<input type = "password" id = "sgnpsw" placeholder="Password" name = "sgn_psw" > 

							<span class = "error" id = "pswnullerror">* Required</span>
							<span class = "error" id = "pswcharerror">* Must be 8 Characters Long</span>
							<span class = "error" id = "pswnumreq">* Must contain number</span>
							<br>
							<input type = "password" id = "sgnconfpsw" placeholder="Confirm Password" name = "sgn_conf_psw" >

							<span class = "error" id = "pswnmtch">* Password does not match</span>
							<span class = "verify" id = "pswmtch">* Password matched</span>
							<br>
							<input type = "submit" value="Sign Up" name = "Signup">
							<span id = "test">Test</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>