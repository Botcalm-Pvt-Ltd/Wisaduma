<?php

include("./include/db.php");

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $stmt = $conn->prepare("SELECT `email` FROM `users` WHERE `email` = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $row_count = $stmt->num_rows;
    $stmt->close();

    if ($row_count == 0) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $email, $hashedPassword);
        $stmt->execute();
        $stmt->close();

        $status = '1';
        $msg = "Registration successful!";
    } else {
        // User already registered
        $status = '2';
        $msg = "Email is already registered";
    }
} else {
    // Invalid request, missing parameters
    $status = '0';
    $msg = "Invalid request";
}

$response = array('msg' => $msg, 'status' => $status);
echo json_encode($response);
?>
