<?php

$connect_db = mysqli_connect("localhost", "root", "", "pdf");

if(!$connect_db){
    echo "<h1>Connection Error From Database</h1>";
    
}


?>