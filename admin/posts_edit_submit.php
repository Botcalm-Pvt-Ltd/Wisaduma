<?php

include('./layouts/db.php');

// post values
$id = $_POST["post_id"];
$title = $_POST["title"];
$desc = $_POST["description"];
$category = $_POST["category"];
$status = $_POST["status"];

// Prepare the update statement
$stmt = $conn->prepare("UPDATE posts SET title=?, description=?, category=?, status=? WHERE id=?");

// Bind the parameters
$stmt->bind_param("ssssi", $title, $desc, $category, $status, $id);

// Execute the statement
if ($stmt->execute()) {
    // Update successful
    $response = array('status' => 1, 'message' => 'Post updated successfully');
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
