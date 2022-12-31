<?php
include("./config.php");

$selectalreadycreateddatabase = mysqli_select_db($connect_db, "images"); 

//If submit button is clicked
if(isset($_POST['fileuploadsubmit'])) {
$fileupload = $_FILES['fileupload']['name'];
$fileuploadTMP = $_FILES['fileupload']['tmp_name'];
//This is the folder where images will be saved.
$folder = "img";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);
//Insert image details into `updis` table
$sql = "INSERT INTO `images`(`file`) VALUES ('$fileupload')";
$qry = mysqli_query($connect_db, $sql);

if ($qry) {
echo "<br />uploaded";
}
}
//Select all data 
$select = " SELECT * FROM `images` " ;
$query = mysqli_query($connect_db, $select) ;
while($row = mysqli_fetch_array($query)) {
$image = $row['name'];
//Display image from the database
echo '<img src="images/'.$image.'" height="150" width="150" >';
}

?>
