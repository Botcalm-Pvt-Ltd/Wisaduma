<?php

include('./include/db.php');

// post values
$id = $_POST["user_id"];
$name = $_POST["name"];
$email = $_POST["email"];


// Check if an image file is uploaded
if (isset($_FILES["img"]) && !empty($_FILES["img"]["name"])) {
    // File upload handling
    $targetDir = "./assets/images/users/"; // Change this to your desired directory
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check === false) {
        $response = array('status' => 0, 'message' => 'File is not an image.');
        echo json_encode($response);
        exit;
    }

    // Check file size (you can adjust the size as needed)
    if ($_FILES["img"]["size"] > 500000) {
        $response = array('status' => 0, 'message' => 'Sorry, your file is too large.');
        echo json_encode($response);
        exit;
    }

    // Allow certain file formats (you can add or remove formats as needed)
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        $response = array('status' => 0, 'message' => 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');
        echo json_encode($response);
        exit;
    }

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
        


        // Update the database with the modified file path and other form data
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, img_path=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $targetFile, $id);
    } else {
        $response = array('status' => 0, 'message' => 'Sorry, there was an error uploading your file.');
        echo json_encode($response);
        exit;
    }
} else {
    // No image uploaded, update the database without the image path

    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);
}

// Execute the statement
if ($stmt->execute()) {
    // Update successful
    $response = array('status' => 1, 'message' => 'User updated successfully');
} else {
    // Update failed
    $response = array('status' => 0, 'message' => 'Error updating user: ' . $stmt->error);
}

// Close the statement
$stmt->close();

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
