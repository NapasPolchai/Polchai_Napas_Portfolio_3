<?php
require_once('includes/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$errors = [];

$name = trim($name);
$email = trim($email);
$msg = trim($msg);

if(empty($name)) {
    $errors['name'] = 'Name cant be empty';
}

if(empty($msg)) {
    $errors['message'] = 'Comment field cant be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'You must provide a REAL email';
}

if(empty($errors)) {

    $query = "INSERT INTO contact (name, email, message) VALUES('.$name.','.$email.','.$msg.')";

    if(mysqli_query($connect, $query)) {

$to = 'polchai.napas@gmail.com';
$subject = 'message from your Portfolio site!';

$message = "You have received a new contact form submission:\n\n";
$message .= "name: ".$name."\n";
$message .= "email: ".$email."\n\n";

mail($to,$subject,$message);

header('Location: index.php');

}else{
    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}

}

?>