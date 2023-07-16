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
				<img src="../img/Lakbay_Tips_2.0 logo_big.png">
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
							
							<input id = "pswlgn_txt" type = "password" placeholder="Password" name = "lgn_psw">
							
							<input type = "submit" value = "Log In" name = "Login">
						</form>
					</div>
					<div class = "signup" id = "sgn">
						<form class = "sgnform" method = "POST" action="" onsubmit = "onSubmit()" novalidate>
							<p class="frmfont">Sign Up</p>
							<input type = "text" id = "sgnfname"placeholder="First Name" name = "fname">
							<input type = "text" id = "sgnlname"placeholder="Last Name" name = "lname" >

							<span class = "error" id = "namereq">* Please Enter Full Name</span>
							
							<input type = "text" id = "sgnusr" placeholder="Username" name = "sgn_usr">

							<span class = "error" id = "usrnullerror">* Required</span>
							<span class = "error" id = "usrcharerror">* Must be 8 Characters Long</span>
							
							<input type = "email" id = "sgneml"placeholder="E-mail" name = "sgn_eml" >

							<span class = "error" id = "valeml">* Valid Email Required</span>
								
							<input type = "password" id = "sgnpsw" placeholder="Password" name = "sgn_psw" > 

							<span class = "error" id = "pswnullerror">* Required</span>
							<span class = "error" id = "pswcharerror">* Must be 8 Characters Long</span>
							<span class = "error" id = "pswnumreq">* Must contain number</span>
							
							<input type = "password" id = "sgnconfpsw" placeholder="Confirm Password" name = "sgn_conf_psw" >

							<span class = "error" id = "pswnmtch">* Password does not match</span>
							<span class = "verify" id = "pswmtch">* Password matched</span>
							
							<input type = "submit" id = "submitbtn" value="Sign Up" name = "Signup">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>