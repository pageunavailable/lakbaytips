<?php
session_start();
require '../php/db_connect.php';
$id = $_SESSION['accid'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
     

    // Validation here
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    try {
        $statement = $db->prepare("UPDATE lt_usr_acc SET 
                                     lt_acc_eml = :email,
                                     lt_acc_fn  = :firstname,
                                     lt_acc_ln  = :lastname,
                                     lt_acc_age = :age,
                                     lt_acc_cp = :mobile,
                                     lt_acc_bdate = :birthdate
                                     WHERE lt_acc_id = :id");
        $statement->bindParam(':firstname', $first_name);
        $statement->bindParam(':lastname', $last_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':mobile', $mobile);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':birthdate', $birthdate);
        $statement->bindParam(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

header("Location: ../php/profile.php");
?>