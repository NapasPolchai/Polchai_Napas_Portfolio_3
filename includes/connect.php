<?php
 
 //$connect = mysqli_connect('localhost','root','root','bookstore'); 

 $dsn = "mysql:host=localhost;dbname=Portfolio;charset=utf8mb4";
 try {
 $connection = new PDO($dsn, 'root', 'root');
 } catch (Exception $e) {
   error_log($e->getMessage());
   exit('unable to connect');
 }



 ?>