<?php

include('./include/db.php');

// post values
$title = $_POST["title"];
$desc = $_POST["description"];
$category = $_POST["category"];
$userID = $_POST["post_by"];


$status = 0;

// Check if an image file is uploaded
if (isset($_FILES["img"]) && !empty($_FILES["img"]["name"])) {
    // File upload handling
    $targetDir = "./assets/images/"; // Change this to your desired directory
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
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
        //not Remove the first letter from the file path
        $targetFile = substr($targetFile, 0);

        // Update the database with the modified file path and other form data
        $stmt = $conn->prepare("INSERT INTO posts (title, description, category, status, img_path, post_by) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $desc, $category, $status, $targetFile, $userID);
    } else {
        $response = array('status' => 0, 'message' => 'Sorry, there was an error uploading your file.');
        echo json_encode($response);
        exit;
    }
} else {
    // No image uploaded, insert into the database without the image path
    $stmt = $conn->prepare("INSERT INTO posts (title, description, category, status, post_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $title, $desc, $category, $status, $userID);
}

// Execute the statement
if ($stmt->execute()) {
    // Insertion successful
    $response = array('status' => 1, 'message' => 'Post added successfully');
} else {
    // Insertion failed
    $response = array('status' => 0, 'message' => 'Error adding post: ' . $stmt->error);
}

// Close the statement
$stmt->close();

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
