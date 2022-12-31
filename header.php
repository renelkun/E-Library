<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<title>Document</title>
</head>
<body>
    <nav class="navbar">
    <div class="logo">CPDRS</div>
        <ul class="nav-links">  
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu">
                <?php
                if(isset($_SESSION['emailAddress'])){
                    echo '<li><a href="adminpdf.php" class="fa-sharp fa-solid fa-house" style="font-size:30px;color:cyan" title="Home"></a></li>
                    <li><a href="uploadForm.php" class="fa-sharp fa-solid fa-arrow-up-from-bracket" style="font-size:30px;color:cyan" title="Upload"></a></li>
                    <li><a href="datatable.php" class="fa-sharp fa-solid fa-file" style="font-size:30px;color:cyan" title="File List"></a></li>
                    <li><a href="admin-approval.php" class="fa-solid fa-user-check" style="font-size:30px;color:cyan" title="User Approval"></a></li>
                    <li><a href="request-approval.php" class="fa-solid fa-file-circle-check" style="font-size:30px;color:cyan" title="Document Request Approval"></a></li>
                    <li><a href="profile.php" class="fa-sharp fa-solid fa-user" style="font-size:30px;color:cyan" title="Profile"></i></a></li>
                    <li><a href="./admin/logout.php" class="fa fa-sign-out" style="font-size:30px;color:#DC143C" title="Log Out"></a></li>';
                }else{
                    echo '<span class="headerText">Admin Panel</span>';
                }
                ?>
            </div>
        </ul>
    </nav>
</body>
</html>