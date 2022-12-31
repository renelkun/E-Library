<?php

include 'config.php';

$id = $_GET['id'];
$pdfName = $_GET['pdf'];

$delete = "DELETE FROM `pdflist` WHERE id = $id";

$deleteQuery = mysqli_query($connect_db, $delete);

if($deleteQuery){
unlink("pdf/$pdfName");
header("location: datatable.php");
}

?>