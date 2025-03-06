<!-- SELECT id, title, name, book_image FROM books,authors WHERE author_id = authors.id ORDER BY title ASC -->
<html>
<?php
//connect to the running database server and the specific database
require_once('includes/connect.php');

//create a query to run in SQL
$stmt = $connect->prepare("SELECT * FROM books ORDER BY title ASC");

$stmt->execute();



//run the query to get back the content
//$results = mysqli_query($connect, $query);




?>

<head>
<script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
<header></header>

<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<section><div class="md:flex"><div class="md:shrink-0">
    <a href="details.php?id='.$row['id'].'"><img class="h-48 w-full object-cover md:h-full md:w-48" src="images/'.$row['book_image'].'" alt="Book Cover Art"></a></div>
    <div class="p-8"><div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">'.$row['title'].'</div>
    <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">'.$row['published_date'].'</a></div></div></section>';
}

$stmt = null;

?>

<footer>
<?php
echo date('l jS \of F Y h:i:s A');
?>
</footer>
</body>
</html>