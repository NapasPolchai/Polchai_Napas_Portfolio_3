<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="css/cms.css">

<?php

require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT project_id,project_title FROM projects ORDER BY project_title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['project_title'].
  '<a href="edit_project_form.php?id='.$row['project_id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['project_id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">project title: </label>
    <input name="title" type="text" required><br><br>
    <label for="img">project image: </label>
    <input name="img" type="file" required><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
<br><br><br>
<a href="logout.php">log out</a>
</body>
</html>
