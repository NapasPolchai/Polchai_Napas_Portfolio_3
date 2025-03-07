<?php
require_once('../includes/connect.php');

// Check if $connection is set
if (!$connection) {
    die("Database connection failed.");
}

// Check if project ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Project ID is missing.");
}

$query = 'DELETE FROM projects WHERE project_id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];

// Validate that $projectId is an integer
$projectId = filter_var($projectId, FILTER_VALIDATE_INT);
if ($projectId === false) {
    die("Invalid project ID.");
}

$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);

try {
    $stmt->execute();
} catch (PDOException $e) {
    die("Error deleting project: " . $e->getMessage());
}

$stmt = null; // Close the statement
header('Location: project_list.php');
exit(); // Ensure no further code executes after redirect
?>