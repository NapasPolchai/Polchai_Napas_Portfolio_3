<?php
require_once('../includes/connect.php');

// Ensure the images directory exists and is writable
$images_dir = '/Applications/MAMP/htdocs/Polchai_Napas_Portfolio_3/images/';
if (!file_exists($images_dir)) {
    mkdir($images_dir, 0755, true);
}

// Check if form was submitted with a file
if (!isset($_FILES['img']) || $_FILES['img']['error'] == UPLOAD_ERR_NO_FILE) {
    die('Error: No file uploaded.');
}

// Generate a unique filename
$random = rand(10000, 99999);
$newname = 'image' . $random;
$filetype = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

// Normalize file extension
if ($filetype == 'jpeg') {
    $filetype = 'jpg';
}
if ($filetype == 'exe') {
    die('Error: Executable files are not allowed.');
}

// Validate file type
$allowed_types = ['jpg', 'png', 'gif'];
if (!in_array($filetype, $allowed_types)) {
    die('Error: Only JPG, PNG, and GIF files are allowed.');
}

$newname .= '.' . $filetype;
$target_file = $images_dir . $newname;

try {
    // Check if database connection exists
    if (!$connection) {
        throw new Exception('Error: Database connection failed.');
    }

    // Move the uploaded file
    if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        throw new Exception('Error: Could not upload file.');
    }

    // Insert into projects table
    $query = "INSERT INTO projects (project_title, project_description, description_type, project_type, clients_id, cover_image) 
              VALUES (?, ?, 'Test', 'UI Design', 0, 0)";
    $stmt = $connection->prepare($query);
    
    // Check if POST variables exist
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    
    $stmt->bindParam(1, $title, PDO::PARAM_STR);
    $stmt->bindParam(2, $desc, PDO::PARAM_STR);
    $stmt->execute();

    // Get the last inserted project_id
    $project_id = $connection->lastInsertId();

    // Insert into media table
    $media_query = "INSERT INTO media (file_type, file_url, project_id) VALUES ('image', ?, ?)";
    $media_stmt = $connection->prepare($media_query);
    $file_url = '/images/' . $newname; // Relative path for web access
    $media_stmt->bindParam(1, $file_url, PDO::PARAM_STR);
    $media_stmt->bindParam(2, $project_id, PDO::PARAM_INT);
    $media_stmt->execute();

    // Clean up
    $stmt = null;
    $media_stmt = null;
    $connection = null;

    // Redirect on success
    header('Location: project_list.php');
    exit;
} catch (Exception $e) {
    // Log the error (in a production environment, you might want to log to a file)
    echo 'Error: ' . $e->getMessage();
    exit;
}
?>