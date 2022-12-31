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
                session_start();
                if(isset($_SESSION['emailAddress'])){
                    echo '<li><a href="user.php" class="fa-sharp fa-solid fa-house" style="font-size:30px;color:cyan" title="Home"></a></li>
                    <li><a href="datatableuser.php" class="fa-sharp fa-solid fa-file" style="font-size:30px;color:cyan" title="File List"></a></li>
                    <li><a href="profileuser.php" class="fa-sharp fa-solid fa-user" style="font-size:30px;color:cyan" title="Profile"></a></li>
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