<?php

include('./layouts/db.php');

// post values
$id = $_POST["modal_id"];


// Prepare the update statement
$stmt = $conn->prepare("UPDATE posts SET  status= 1 WHERE id=?");

// Bind the parameters
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    // Update successful
    $response = array('status' => 1, 'message' => 'Post approved successfully');
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
