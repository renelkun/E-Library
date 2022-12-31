<?php
    session_start();
    include "config.php";
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>  
           <title>datatable</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
</head>
<body>

<body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Capstone</h3>  
                <br /> 
                <div class="table-responsive">
                <table id="employee_data" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            <th scope="col">User type</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query = "SELECT * FROM authentication WHERE status = 'pending' ORDER BY id ASC";
                    $result = mysqli_query($connect_db,$query);
                    while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>
                                <form action = "admin-approval.php" method ='POST'>
                                    <input type="hidden" name="id" value = "<?php echo $row['id'];?>"/>
                                    <input type="submit" name="approve" value="Approve" class="btn btn-primary"/>
                                    <input type="submit" name="deny" value="Deny" class = "btn btn-danger"/>
                                    <td><select name="usertype">
                                        <option value="Faculty" selected>Faculty</option>
                                        <option value="Student">Student</option>
                                    </select></td>
                                </form>
                            </td>
                        </tr>
                        <?php }?>

                        <?php
                        if(isset($_POST['approve'])){
                            $usertype = $_POST['usertype'];
                            $id = $_POST['id'];
                            $select = "UPDATE authentication SET status = 'approved', usertype = '$usertype' WHERE id = '$id'";
                            $result = mysqli_query($connect_db,$select);
                            ?>
                            <script>
                                alert("User Approved!");
                                window.open("admin-approval.php", "_self");
                            </script>
                    <?php
                        }
                        if(isset($_POST['deny'])){
                            $id = $_POST['id'];

                            $select = "DELETE FROM authentication WHERE id = '$id'";
                            $result = mysqli_query($connect_db,$select);

                            ?>
                            <script>
                                alert("User denied!");
                                window.open("admin-approval.php", "_self");
                            </script>
                        <?php
                        } 
                        ?>
                    </tbody>
                </table>
                </div>       
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  









