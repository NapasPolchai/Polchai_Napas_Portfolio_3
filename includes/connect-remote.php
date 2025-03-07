<?php
 
 

 $dsn = "mysql:host=localhost;dbname=nub53937_portfolio;charset=utf8mb4";
 try {
 $connection = new PDO($dsn, 'nub53937_general', '2882528825PArN!');
 } catch (Exception $e) {
   error_log($e->getMessage());
   exit('unable to connect');
 }



 ?>