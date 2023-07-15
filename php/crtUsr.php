<?php
    include("db_connect.php");

	$id = $_POST['id'];


	$stmt = $db->prepare("INSERT INTO hmd_pfl (pfl_id) VALUES(?)");
	$result = $stmt->execute([$id]);
	
	if($result){
		echo json_encode([
			'code' => '201'
		]);
	}
	else{
		echo json_encode([
			'code' => '31'
		]);
	}
?>