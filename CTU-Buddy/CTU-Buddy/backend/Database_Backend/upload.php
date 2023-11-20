<?php
include 'db_inc_pdo.php';

// Create a connection to the database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        // File upload successful, insert file info into the database
        $fileName = $_FILES['file']['name'];
        $filePath = $uploadFile;

        $sql = "INSERT INTO files (file_name, file_path) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $fileName, $filePath);
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle file upload error
        echo "Error uploading file.";
    }
}
?>
