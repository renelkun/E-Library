<?php 

include 'config.php';

// "submit" is the button name.
// if(isset($_POST['submit'])){

  // this 'pdf' is the name of input field
  $pdf = $_FILES['pdf']['name']; // define name of input
  $pdf_type = $_FILES['pdf']['type']; // define type of input
  $pdf_size = $_FILES['pdf']['size']; // define size of input
  $pdf_tem_loc = $_FILES['pdf']['tmp_name']; // define temporary location with file name
  $pdf_store = "pdf/".$pdf; //store file in "./pdf" location
  $title = $_POST['title'];
  $yearpublished = $_POST['yearpublished'];
  $authors = $_POST['authors'];
  $abstract = $_POST['abstract'];


  move_uploaded_file($pdf_tem_loc, $pdf_store); // finally moved file from temporary location to permanent location

  $insert = "INSERT INTO pdflist(pdf, title, year_published, author, abstract) VALUES('$pdf', '$title', '$yearpublished', '$authors', '$abstract')";
  // `pdflist` is the database table name, `pdfile` is the table field name.

  $insertQuery = mysqli_query($connect_db, $insert);
  // execute the function

// }
?>
<?php
if(isset($_POST["btnsubmit"])){   

  $title = addslashes(ucwords(strtolower(trim($_POST['title']))));
      $query = $con -> query("INSERT INTO pdflist(title) VALUES ('$title')") or die($con -> error);
      
      

  echo "<script> window.location='uploadform.php';</script>";
}
?>