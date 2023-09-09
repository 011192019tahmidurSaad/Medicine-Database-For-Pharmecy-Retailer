<?php
    $hostname = 'localhost';
    $username = 'Tahmidur Saad';
    $password = '#trs.saad';
    $dbname ='medidb';
    $conn = new mysqli($hostname,$username,$password,$dbname);
    if($conn -> connect_error)
       die("Connection failed: ". $conn->connect_error);
 ?>