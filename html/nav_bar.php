<?php
    session_start();
    if(isset($_POST['lgout'])){
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    if(isset($_SESSION['accid'])){
	}
    else{
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width" initial-scale ="1.0">
		<title>Lakbay Tips</title>
		<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    </head>
    <body>
        <div class = "navcontainer">
            <div class = "navlogo">
                <div class = "logoborder">
                    <a href = "home.php"><img src="../assets/img/Lakbay_Tips_2.0 logo_big.png" class = "navimg"></a>
                </div>
            </div>
            <div class = "navlist">
                <ul>

                    <li><a href = "home.php" class = "navbtn">Home</a></li>
                    <li><a href = "travel.php" class = "navbtn">Travel</a></li>
                    <li>
                        <div class = "dropdown">
                            <a href = "profile.php" class = "navbtn">Account</a>
                            <div class = drpcontent>
                                <a href = "profile.php">PROFILE</a>
                                <form method="POST">
                                    <input type = "submit" value = "LOG OUT" name = "lgout">
                                </form>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </body>
</html>