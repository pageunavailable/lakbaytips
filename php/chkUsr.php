<?php

    include("db_connect.php");

	$user = $_POST['sgnusr'];

	$stmt = $db->prepare("SELECT * FROM lt_usr_acc WHERE lt_acc_usrnm = ?");
			$stmt->execute([$user]);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	echo json_encode($result);

?>