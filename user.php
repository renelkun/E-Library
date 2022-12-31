<?php
 include('headeruser.php');
 include 'config.php';

?>
<style>
html, body {
    background-image: url("./img/homebg.webp");    
    text-align: center;
    height: 100%;
    overflow: hidden;

  }
  .svg-wrapper {
    position: relative;
    top: 20%;
    transform: translateY(-60%);
        margin: 0 auto;
    width: 320px;  
  }
  .shape {
    stroke-dasharray: 140 540;
    stroke-dashoffset: -474;
    stroke-width: 8px;
    fill: transparent;
    stroke: #19f6e8;
    border-bottom: 5px solid black;
    transition: stroke-width 1s, stroke-dashoffset 1s, stroke-dasharray 1s;
  }
  .text {
    font-family: 'Roboto Condensed';
    font-size: 25px;
    line-height: 32px;
    letter-spacing: 8px;
    color: #fff;
    top: -48px;
    position: relative;
  }
  .svg-wrapper:hover .shape {
    stroke-width: 2px;
    stroke-dashoffset: 0;
    stroke-dasharray: 760;
  }
  .title{
    font-family: 'Roboto Condensed';
    font-size: 30px;
    line-height: 32px;
    letter-spacing: 8px;
    color: #fff;
    top: 220px;
    position: relative;
  }
  .info1{
    font-family: 'Roboto Condensed';
    font-size: 20px;
    line-height: 32px;
    letter-spacing: 6px;
    color: #fff;
    top: 200px;
    position: relative;
  }
  .info2{
    font-family: 'Roboto Condensed';
    font-size: 15px;
    line-height: 32px;
    letter-spacing: 6px;
    color: #fff;
    top: 210px;
    position: relative;
  }
  .blue1{
    color:#19f6e8;
  }
  .blue2{
    color:#19f6e8;
  }
  body{
    background: rgba(0,0,0,0.9);
  }
</style>
<body>
<div class="title">    
            <a class="blue1">CAPSTONE PROJECT DOCUMENT</a> REPOSITORY SYSTEM
</div>  
<div class="svg-wrapper">
  <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
    <rect class="shape" height="60" width="320" />
    <div class="text">WELCOME</div>
  </svg>
</div>
<div class="info1">    
Allows all <a class="blue2">CAPSTONE PROJECT DOCUMENTS</a> to exist together in one place.
</div>  
<div class="info2">
The repository system provides a  submission service for receiving the digital files and some metadata, assigning an identifier to the digital object that can be used for access, and putting it in a collection.
</div>
</body>
<?php include("./footer.php"); ?>