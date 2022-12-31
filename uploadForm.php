<style>
body{
    background-image: url("./img/bgbg.jpg");  
}
h2{
    color:white;
}
form{
    color:white;
}
input[type=file]{
    background-color:#393d42;  
    color:white;}  
input[type=text]{
    background-color:#393d42;  
        color:white;}  
input[type=int]{
    background-color:#393d42;  
        color:white;}    
textarea{
    background-color:#393d42;  
        color:white;
    }
</style>
<?php 
    session_start();
    include('./header.php'); ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script>
        /*Source @ DevelopPHP.com || Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
        function _(el){
            return document.getElementById(el);
        }
        function uploadFile(){
            var file = _("pdf").files[0];
            var title = document.getElementById("title").value;
            var yearpublished = document.getElementById("yearpublished").value;
            var authors = document.getElementById("authors").value;
            var abstract = document.getElementById("abstract").value;
            var formdata = new FormData();
            formdata.append("pdf", file);
            formdata.append("title", title);
            formdata.append("yearpublished", yearpublished);
            formdata.append("authors", authors);
            formdata.append("abstract", abstract);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "upload.php");
            ajax.send(formdata);
        }
        function progressHandler(event){
            _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
        }
        function completeHandler(event){
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }
        function errorHandler(event){
            _("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            _("status").innerHTML = "Upload Aborted";
        }
        </script>
</head>
<section class="container my-5">
<progress id="progressBar" value="0" max="100" style="font-size:30px;color:cyan; width:50%;"></progress>    
    </br>
    <h2>Upload Your PDF</h2>
    <form id="upload_form" enctype="multipart/form-data" method="post">
        <input type="file" name="pdf" accept=".pdf" id="pdf" onkeyup="manage()" />             
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
        <div class="mb-3">
            <label for="exampleInputTitle" class="form-label">Title
            <input type="text" class="form-control" name="title" id="title" required/>
        </div>
    <div class="mb-3">
            <label for="exampleInputYearpublished" class="form-label">Year Published
            <input type="int" class="form-control" name="YearPublished" id="yearpublished" required/>
    </div>
    <div class="mb-3">
            <label for="exampleInputAbstract" class="form-label">Authors
            <input type="text" class="form-control" name="Email" id="authors" required/>
        </div>
        <label for="exampleInputAbstract" class="form-label">Abstract
        <div id="form_text">
              <textarea rows="10" cols="40" name="message" id="abstract">Your text...</textarea>
            </div>
    <br/>
    <input type="button" id="btnSubmit" value="Upload File" onclick="uploadFile()" class="btn btn-success" enabled />
    </form>

    <script>
        var pdfFile = document.getElementById('pdf');
        var btn = document.getElementById('btnSubmit');
        function manage() {
        if(pdfFile.type('file').length < 0) {
            btn.disabled = true;
        } else {
            btn.disabled = false;
        }
    }
    </script>
    
</section>
<?php include('./footer.php'); ?>