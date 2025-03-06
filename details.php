<html>
<?php
require_once('includes/connect.php');


$query = 'SELECT * FROM books, authors WHERE author_id = authors.id AND books.id = :bookid';

$stmt = $connect->prepare($query);

$bookid = $_GET['id'];

$stmt->bindParam(':bookid', $bookid, PDO::PARAM_INT);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

//$results = mysqli_query($connect,$query);

//$row = mysqli_fetch_assoc($results);



?>
<head></head>
<body>
<header></header>
<main>
<section>
<h1>
<?php echo $row['title']; ?>
</h1>

</section>

<div><?php echo $row['name']; ?></div>

<section>

</section>

</main>

<footer></footer>
</body>
</html>