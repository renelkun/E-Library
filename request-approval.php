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
           <br /><br />  
           <div class="container">  
                <h3 align="center">Capstone</h3>  
                <br /> 
                <div class="table-responsive">
                <table id="employee_data" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">request id</th>
                            <th scope="col">pdf id</th>
                            <th scope="col">email</th>
                            <th scope="col">Reason</th>
                            <th scope="col">request date</th>
                            <th scope="col">request status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $query = "SELECT * FROM requests WHERE req_status = 'Pending' ORDER BY req_id ASC";
                        $result = mysqli_query($connect_db,$query) or die( mysqli_error($connect_db));
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['req_id'];?></td>
                            <td><?php echo $row['pdf_id'];?></td>
                            <td><?php echo $row['profile_id'];?></td>
                            <td><?php echo $row['req_reason'];?></td>
                            <td><?php echo $row['req_date'];?></td>
                            <td>
                                <form action = "request-approval.php" method ='POST'>
                                    <input type="hidden" name="req_id" value = "<?php echo $row['req_id'];?>"/>
                                    <input type="submit" name="approve" value="Approve" class = "btn btn-primary"/>
                                    <input type="submit" name="deny" value="Deny" class = "btn btn-danger"/>
                                </form>
                            </td>
                        </tr>
                        <?php }?>

                        <?php
                            if(isset($_POST['approve'])){
                                // $usertype = $_POST['usertype'];
                                $req_id = $_POST['req_id'];
                                $select = "UPDATE requests SET req_status = 'Approved' WHERE req_id = '$req_id'";
                                $result = mysqli_query($connect_db,$select);
                                ?>
                                <script>
                                    alert("request Approved!");
                                    window.open("request-approval.php", "_self");
                                </script>
                        <?php
                        }
                        if(isset($_POST['deny'])){
                            $req_id = $_POST['req_id'];

                            $select = "UPDATE requests SET req_status = 'Rejected' WHERE req_id = '$req_id'";
                            $result = mysqli_query($connect_db,$select);

                            ?>
                            <script>
                                alert("request denied!");
                                window.open("request-approval.php", "_self");
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




