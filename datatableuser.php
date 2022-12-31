<?php 
 include('headeruser.php');
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "pdf";

 $con = new mysqli($host, $user, $pass, $db);

 if(!isset($_SESSION['emailAddress'])){
     header("location: http://localhost/php/pdf-upload/admin/login.php");
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
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
                            <th scope="col">#</th>
                            <th scope="col">PDF</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $url = "http://localhost/php/pdf-upload/";
                    $displayQuery = $con -> query("SELECT * FROM `pdflist`") or die($con -> error);  
                    
                    while($record = $displayQuery -> fetch_assoc()){
                    ?>

                    <tr>
                        <td><?php echo $record["id"] ?></td>
                        <td><embed type="application/pdf" src="pdf/<?php echo $record["pdf"] ?>" class="pdf"></td>
                        <td><?php echo $record["title"] ?></td>
                        <?php
                            $pdfid = $record['id'];
                            $id = $_SESSION['id'];
                            $select = $con -> query("SELECT * FROM requests WHERE profile_id = '$id' AND pdf_id =  '$pdfid'") or die($con -> error);
                            $countreq = $select -> num_rows; 
                            
                            if($countreq == 0){
                        ?>
                                <td>
                                    <a href="request.php?id=<?php echo $id; ?>&pdfid=<?php echo $pdfid; ?>" class="btn btn-primary">REQUEST</a>    
                                </td>
                        <?php
                            }else{
                                $fetch = $select -> fetch_assoc();
                            
                                if($fetch['req_status'] == "Approved"){
                        ?>
                                    <td>
                                        <a href="pdf/<?php echo $record["pdf"]."#toolbar=0" ?>" target="_blank" onclick="return false;" class="btn btn-primary">View</a>
                                        <a href="pdf/<?php echo $record["pdf"]; ?>" download class="btn btn-success">Download</a>
                                    </td>
                        <?php
                                }elseif($fetch['req_status'] == "Rejected"){
                        ?>
                                    <td>
                                        <p>
                                            <b style="color: red;">
                                                REQUEST REJECTED! TRY AGAIN AFTER 6 HOURS
                                            </b>
                                            <br>
                                            <?php
                                                date_default_timezone_set("Asia/Manila");
                                                $datetime1 = strtotime(date('Y-m-d H:i:s'));
                                                $datetime2 = strtotime($fetch['req_date']);

                                                $diff = floor((($datetime1 - $datetime2) / 60) / 60);

                                                if($diff >= 6){
                                            ?>
                                                    <a href="request.php?id=<?php echo $id; ?>&pdfid=<?php echo $pdfid; ?>" class="btn btn-primary">RETRY REQUEST</a>    
                                            <?php
                                                }
                                            ?>
                                        </p>
                                    </td>
                        <?php
                                }else{
                        ?>
                                    <td>
                                        <a href="pdf/<?php echo $record["pdf"]."#toolbar=0" ?>" target="_blank" onclick="return false;" class="btn btn-primary">Pending</a>
                                    </td>
                        <?php
                                }
                            }
                        ?>
                       
                    </tr>
                    <?php } ?>

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
 </script>  