<?php
?>

<!DOCTYPE html>
<html lang= "en" dir="ltr">
<head>
        <title>
            Administrator
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body class="container">
    <div class="center">
      <h1 class = "formtitle">Admin</h1>
        <form method = "POST">
            <div class="txt_field">
                <input type ="text" name = "adm_usr" required></input>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type ="password" name = "adm_psw" required></input>
                <span></span>
                <label>Password</label>
            </div>
                <input type = "submit" value = "login" name = "adm_sbt"></input>
        </form>
    </div>
</body>

</html>
