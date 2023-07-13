<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width" initial-scale ="1.0">
		<title>Lakbay Tips</title>
		<link rel="stylesheet" type="text/css" href="../css/indexstyle.css">
		<script type="text/javascript " src="../js/landingtab_toggle.js"></script>
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
					<button class = "loginbtn" onclick="test()">
						Log In
					</button>
					<button class = "signupbtn" onclick="SignUpToggle()">
						Sign Up
					</button>
				</div>
					<div class = "login" id = "lgn">
						<form class = "lgnform" method = "POST">
							<p class="frmfont">Log In</p>
							<input type = "text" placeholder="Username">
							<input type = "password" placeholder="Password">
							<input type = "submit" value = "Log In">
						</form>
					</div>
					<div class = "signup" id = "sgn">
						<form class = "sgnform" method = "POST">
							<p class="frmfont">Sign Up</p>
							<input type = "text" placeholder="First Name">
							<input type = "text" placeholder="Last Name">
							<input type = "text" placeholder="Username">
							<input type = "text" placeholder="E-mail">
							<input type = "password" placeholder="Password">
							<input type = "password" placeholder="Confirm Password">
							<input type = "submit" value="Sign Up">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>