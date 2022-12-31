<style>
    body{
        text-align:center;
        background-color: black;
    }
    label{
        font-family: 'Roboto Condensed';
        font-size: 24px;
        line-height: 32px;
        letter-spacing: 6px;
        position: relative;
    }
    textarea{
        border-radius:24px;
        padding:50;
        font-family: 'Roboto Condensed';
        -webkit-transition: .3s ease-in-out;
	    transition: .3s ease-in-out;    
    }
    textarea:hover{
        padding:55;
    }
    button{
        width:180px;
        height:60px;
        -webkit-transition: .2s ease-in-out;
	    transition: .2s ease-in-out; 
    }

    
</style>
<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pdf";

    $con = new mysqli($host, $user, $pass, $db);

    if(isset($_POST['submit'])){
        $pdfid = $_POST['pdfid'];
        $id = $_POST['id'];
        $reason = addslashes(trim($_POST['reason']));

        $deleter = $con -> query("DELETE FROM requests WHERE pdf_id = '$pdfid' AND profile_id = '$id'");
        $insert = $con -> query("INSERT INTO requests(pdf_id, profile_id, req_reason) VALUES('$pdfid','$id', '$reason')") or die($con -> error);

        echo "<script>window.open('datatableuser.php', '_self');</script>";
    }else{
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    </head>
    <body>
        <form action="request.php" method="POST">
            <input type="hidden" name="pdfid" id="pdfid" value="<?php echo $_GET['pdfid']; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <label for="reason">REASON FOR REQUESTING</label><br>
            <textarea name="reason" id="reason" cols="30" rows="10"></textarea><br>
            <button name="submit" type="submit" id="submit" class="btn btn-primary">
                SUBMIT REQUEST
            </button>
        </form>
    </body>
</html>
<?php
    }
?>