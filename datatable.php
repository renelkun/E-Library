
<?php  
session_start();
 include('./header.php');
 include 'config.php';

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
                            <th scope="col">View</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'config.php';
                    $display = "SELECT * FROM `pdflist`";
                    $url = "http://localhost/php/pdf-upload/";
                    $displayQuery = mysqli_query($connect_db, $display);  
                    
                    while($record = mysqli_fetch_array($displayQuery)){
                    ?>

                    <tr>
                        <td><?php echo $record["id"] ?></td>
                        <td><embed type="application/pdf" src="pdf/<?php echo $record["pdf"] ?>" class="pdf"></td>
                        <td><?php echo $record["title"] ?></td>
                        <td><a href="pdf/<?php echo $record["pdf"]."#toolbar=0" ?>" target="_blank" class="fa-solid fa-eye" style="font-size:30px;color:#008080" title="View"></a></td>
                        <td><a href="pdf/<?php echo $record["pdf"]; ?>" class="fa-solid fa-download" style="font-size:30px;color:#2E8B57" title="Download" download></td>
                        <td><a href="delete.php?id=<?php echo $record['id']; ?>&pdf=<?php echo $record["pdf"]; ?>" class="fa-solid fa-trash" style="font-size:30px;color:red" title="Delete"></a></td>
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