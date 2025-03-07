<?php
require_once('../includes/connect.php');

try {
    $query = "UPDATE projects SET project_title = ?, cover_image = ?, project_description = ? WHERE project_id = ?";
    
    $stmt = $connection->prepare($query);
    
    if ($stmt === false) {
        throw new Exception("Failed to prepare statement: " . $connection->error);
    }
    
    $project_title = isset($_POST['project_title']) ? $_POST['project_title'] : '';
    $cover_image_id = isset($_POST['thumb']) ? (int)$_POST['thumb'] : 0; // Convert to integer
    $project_description = isset($_POST['project_description']) ? $_POST['project_description'] : '';
    $project_id = isset($_POST['pk']) ? (int)$_POST['pk'] : 0;
    
    $stmt->bindParam(1, $project_title, PDO::PARAM_STR);
    $stmt->bindParam(2, $cover_image_id, PDO::PARAM_INT); // Changed to INT
    $stmt->bindParam(3, $project_description, PDO::PARAM_STR);
    $stmt->bindParam(4, $project_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $stmt = null;
        header('Location: project_list.php');
        exit;
    } else {
        throw new Exception("Failed to update project");
    }
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>