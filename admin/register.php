<?
session_start();
include('../header.php');
?>

<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pdf";

    $con = new mysqli($host, $user, $pass, $db);

    if(isset($_POST["submit"])){   
    $checklast = $con -> query("SELECT * FROM authentication ORDER BY id DESC LIMIT 1") or die($con -> error);
    $fetchid = $checklast -> fetch_assoc();

    $last_id = $fetchid['id'];
    $email = $_POST['EmailInput'];
    $pass = $_POST['PasswordInput'];
    $select = $con -> query("SELECT * FROM `authentication` WHERE `email` = '$email'") or die($con -> error);
    $numRow = $select -> num_rows;
    if($numRow > 0) {
        echo "<h1 style='color: red; display: flex; justify-content: center;'>User already exists!</h1><span style='display: flex; justify-content: center;'>Go to: <a href='./login.php'>Login.</a></span>";
    } else {
        $insrt = $con -> query("UPDATE authentication SET email = '$email', password = '$pass' WHERE ID = '$last_id'") or die($con -> error);
        echo "
        <h1 style='color: green; display: flex; justify-content: center;'>Registration successful.</h1><span style='display: flex; justify-content: center;'>Go to: <a href='./login.php'>Login.</a></span>";
    }    
    echo "<script> window.location='login.php';</script>";
    echo "
    <h1 style='color: green; display: flex; justify-content: center;'>Registration successful.</h1><span style='display: flex; justify-content: center;'>Go to: <a href='./login.php'>Login.</a></span>";
}
?>

<section class="container my-5">
<div class="row">
    <h1 class="text-center">Please Sign Up</h1>
    <div class="col-12 col-md-3"></div>
        <form method="post" class="col-12 col-md-6 my-5 authForm">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="EmailInput" required />                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="PasswordInput" required />
            </div>

            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
        </form>
        <span>Want to <a href="./login.php">Login</a>?</span>
    <div class="col-12 col-md-3"></div>
</div>
</section>

<?php
include('../footer.php');
?>