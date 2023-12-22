<?php

include('./include/db.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT `email`, `password`, `id` FROM `users` WHERE `email` = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbEmail, $dbPassword, $userId);
    $stmt->fetch();
    $row_count = $stmt->num_rows;
    $stmt->close();

    if ($row_count == 1) {
        // Verify the password using password_verify instead of hashing it again
        if (password_verify($password, $dbPassword)) {
            $_SESSION['user'] = $userId;
            $status = '1';
            $msg = "success";
        } else {
            $status = '2';
            $msg = 'Email password combination is wrong!';
        }
    } else {
        $status = '0';
        $msg = "User not found!";
    }
}

$response = array('msg' => $msg, 'status' => $status);
echo json_encode($response);
?>
