<?php
require '../php/db_connect.php';
#User
$statement = $db->prepare("SELECT * FROM lt_usr_acc");
$statement->execute();
//$result = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<head>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/admin_main.css">
</head>

<body>
    <div class = "main-container">
        <div class = "tabmodule">
            <span class = "pagelabel">Accounts</span>
            <div class = "shadowoutline">
                <div>
                    <button class="usertab" onclick= >Users</button>
                    <button class="admintab" onclick= >Admin</button>
                </div>
                <div class = "acc-container">
                    <div class = "user-content">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                </tr>
                                <?php
                                    while($result = $statement->fetch(PDO::FETCH_ASSOC)) 
                                    {
                                ?> 
                                <tr>
                                    <td><?=$result['lt_acc_id']?></td>
                                    <td><?=$result['lt_acc_fn'] . " " . $result['lt_acc_ln']?></td>        
                                </tr>
                                <?php
                                    }
                                ?>
                                    
                            </table>
                        </div>
                    </div> 
                    <div class = "admin-content">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
