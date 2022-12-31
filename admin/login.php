<?php
session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<?php
//     include "../config.php";
//     if(isset($_POST["login"])){   

//     $email = $_POST['EmailInput'];
//     $pass = $_POST['PasswordInput'];
//     $select = "SELECT * FROM `authentication` WHERE `email` = '$email' && `password` = '$pass'";
//     $qry = mysqli_query($connect_db,$select);
//     $numRow = mysqli_num_rows($qry);    

//     if($numRow > 0) {
//         $_SESSION['emailAddress'] = $email;
//         header("Location: ../adminpdf.php");
//     } else {
//         echo "<h1 style='color: red; display: flex; justify-content: center;'>Username or password is incorrect!</h1>";
//     }

// }

?>

<?php
    include "../config.php";
    if(isset($_POST["login"])){   

    $email = $_POST['EmailInput'];
    $pass = $_POST['PasswordInput'];

    $select = mysqli_query($connect_db, "SELECT * FROM authentication WHERE email = '$email' && password = '$pass'");
    $numRow = mysqli_fetch_assoc($select);   
    
    $select2 = mysqli_query($connect_db, "SELECT * FROM authentication WHERE email = '$email' && password = '$pass'");
    $check_user = mysqli_num_rows($select2);   

    if($check_user==1){
        $status = $numRow['status'];
        $usertype = $numRow['usertype'];
        $_SESSION["status"]=$numRow['status'];
        $_SESSION["id"]=$numRow['id'];
        $_SESSION["email"]=$numRow['email'];
        $_SESSION["pass"]=$numRow['password'];
        $_SESSION["usertype"]=$numRow['usertype'];

        if($status=="approved"){
            echo '<script type = "text/javascript">';
            echo 'alert("login succes")';
            echo '</script>';
                if($numRow > 0) {
                    $_SESSION['emailAddress'] = $email;

                        if($usertype == "Student"){
                            header("Location: ../user.php");
                        }elseif($usertype == "Administrator"){
                            header("Location: ../adminpdf.php");
                        }

                        echo $usertype;
                } else {
                    echo "<h1 style='color: red; display: flex; justify-content: center;'>Username or password is incorrect!</h1>";
                }
        }
        elseif($status=="pending"){
            header("Location: login.php");
            echo "<h1 style='color: red; display: flex; justify-content: center;'>Account is pending!</h1>";
        }
    }else{
        echo "<h1 style='color: red; display: flex; justify-content: center;'>Username or password is incorrect!</h1>";
    }

}

?>

<?php
// if(isset($_SESSION['emailAddress'])){
//     header("location: ../adminpdf.php");
// }
?>
<section class="container my-5">
<div class="row">
    <h1 class="text-center">Please Login</h1>
     <div class="col-12 col-md-3"></div>
    <form method="POST" class="col-12 col-md-6 my-5 authForm" action="login.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="EmailInput" required/>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="PasswordInput" required/>
        </div>        
        <button type="submit" name="login" class="btn btn-outline-success">Login</button>
    </form>
    <span>Want to <a href="./biograph.php">Sign Up</a>?</span>
    <div class="col-12 col-md-3"></div>
</div>
</section>



<?php
include('../footer.php');
?>