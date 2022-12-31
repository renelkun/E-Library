<?php
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

    $lastname = addslashes(ucwords(strtolower(trim($_POST['lastname']))));
    $firstname = addslashes(ucwords(strtolower(trim($_POST['firstname']))));
    $middlename= addslashes(ucwords(strtolower(trim($_POST['middlename']))));
    $sex=$_POST['sex'];
    $contact= "0" . $_POST['contact'];
    $barangay= addslashes(ucwords(strtolower(trim($_POST['barangay']))));
    $town= addslashes(ucwords(strtolower(trim($_POST['town']))));
    $province= addslashes(ucwords(strtolower(trim($_POST['province']))));
    

        $query = $con -> query("INSERT INTO authentication(email , password, lname , fname, mname, sex, contact_number, brgy, town, province) VALUES ('$email', '$pass','$lastname', '$firstname','$middlename','$sex','$contact','$barangay','$town','$province')") or die($con -> error);
        
        

    echo "<script> window.location='register.php';</script>";
}
?>

<section class="container my-5">
<div class="row">
    <h1 class="text-center">Please Sign Up</h1>
    <div class="col-12 col-md-3"></div>
        <form method="post" class="col-12 col-md-6 my-5 authForm">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" required />                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="middlename" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sex</label><br>
                <input type="radio" class="form-contro" name="sex" id="male" value="Male" required />
                <label for="male">MALE</label><br>
                <input type="radio" class="form-contrl" name="sex" id="female" value="Female" required />
                <label for="female">FEMALE</label><br>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contact Number</label>
                <input type="number" class="form-control" name="contact" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Barangay</label>
                <input type="text" class="form-control" name="barangay" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Town</label>
                <input type="text" class="form-control" name="town" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Province</label>
                <input type="text" class="form-control" name="province" required />
            </div>

            <button type="submit" name="submit" class="btn btn-outline-primary">
           Next</button>
           
        </form>
        <span>Want to <a href="./login.php">Login</a>?</span>
    <div class="col-12 col-md-3"></div>
</div>
</section>

<?php
include('../footer.php');
?>