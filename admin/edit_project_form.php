<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');

// Use the correct column name 'project_id' instead of 'id'
$query = 'SELECT * FROM projects WHERE project_id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'] ?? 0; // Use null coalescing operator for safety
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if project exists
if (!$row) {
    die('Error: Project not found.');
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
    <form action="edit_project.php" method="POST">
        <input name="pk" type="hidden" value="<?php echo $row['project_id']; ?>">
        <label for="title">Project Title: </label>
        <input name="title" type="text" value="<?php echo htmlspecialchars($row['project_title']); ?>" required><br><br>
        <label for="thumb">Project Thumbnail: </label>
        <input name="thumb" type="text" required value="<?php echo htmlspecialchars($row['cover_image']); ?>"><br><br>
        <label for="desc">Project Description: </label>
        <textarea name="desc" required><?php echo htmlspecialchars($row['project_description']); ?></textarea><br><br>
        <input name="submit" type="submit" value="Edit">
    </form>
<?php
$stmt = null;
$connection = null;
?>
</body>
</html>