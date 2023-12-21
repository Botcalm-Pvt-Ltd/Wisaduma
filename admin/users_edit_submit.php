<?php

include('./layouts/db.php');

// post values
$id = $_POST["user_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$national_id = $_POST["national_id"];
$contact_num = $_POST["contact_num"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$status = $_POST["status"];

// Prepare the update statement
$stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, national_id=?, contact_num=?, email=?, gender=?, status=? WHERE id=?");

// Bind the parameters
$stmt->bind_param("sssssssi", $fname, $lname, $national_id, $contact_num, $email, $gender, $status, $id);

// Execute the statement
if ($stmt->execute()) {
    // Update successful
    $response = array('status' => 1, 'message' => 'User updated successfully');
} else {
    // Update failed
    $response = array('status' => 0, 'message' => 'Error updating post: ' . $stmt->error);
}

// Close the statement
$stmt->close();

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
