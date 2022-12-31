<?php
include('headeruser.php');
?>

<style>
.singlePdf {
    border: 1px solid #000;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
}
.pdf{
    width: 100% !important
}
.mybtn{
    border: 1px dotted #000000;
    background-color: #F0F8FF;
}
.mybtn:hover{
    background-color: #F0FFFF;
}
h2{
    text-align:center;
    padding: 10px;
}
p{
    text-align:center;
    padding: 10px;
}
display{
    text-align:center;
    padding: 10px;
}
th {
  border: 1px solid;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: justify;
  background-color: #3090C7 ;
  color: white;
  width: 40%;
}
td {
  border: 1px solid;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: justify;
  background-color: #f2f2f2;
  color: black;
  width: 70%;
}
td, th{
  border: 1px solid #ddd;
  padding: 8px;
}
td:hover {
    background-color: #ddd;
}
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}
</style>
</body>

<?php include("./footer.php"); ?>

<h2>Welcome</h2>
<?php
include("./config.php");

$email = $_SESSION['emailAddress']; 






//get results from database
$result = mysqli_query($connect_db,"SELECT * FROM authentication WHERE email = '$email'");
$fetch = $result -> fetch_assoc();
// $all_property = array();  //declare an array for saving property


?>
<center>
<table class="data-table">
    <tr>
        <th>
            Lastname:
        </th>
        <td>
            <b>
                <?php
                    echo ucwords(strtolower(trim($fetch['lname'])));
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Firstname:
        </th>
        <td>
            <b>
                <?php
                    echo ucwords(strtolower(trim($fetch['fname'])));
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Middlename:
        </th>
        <td>
            <b>
                <?php
                    echo ucwords(strtolower(trim($fetch['mname'])));
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Sex:
        </th>
        <td>
            <b>
                <?php
                    echo ucwords(strtolower(trim($fetch['sex'])));
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Contact Number:
        </th>
        <td>
            <b>
                <?php
                    echo '0' . $fetch['contact_number'];
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Address:
        </th>
        <td>
            <b>
                <?php
                    $address = $fetch['brgy'] . ', ' . $fetch['town'] . ', ' . $fetch['province'];
                    echo ucwords(strtolower(trim($address)));
                ?>
            </b>
        </td>
    </tr>
    <tr>
        <th>
            Role:
        </th>
        <td>
            <b>
                <?php
                    echo $fetch['usertype'];
                ?>
            </b>
        </td>
    </tr>
</table>
</center>