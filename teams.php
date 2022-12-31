<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>3D Flip Card on Hover</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="card front-face">
        <img src="./img/renel.jpg">
      </div>
      <div class="card back-face">
        <img src="./img/renel.jpg">
        <div class="info">
          <div class="title"></div>
          <p>Renel John G. Castañeda<br>front-end/back-end developer</p>
        </div>
        <ul>
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </ul>
      </div>
    </div>

    <div class="wrapper">
      <div class="card front-face">
        <img src="./img/owell.jpg">
      </div>
      <div class="card back-face">
        <img src="./img/owell.jpg">
        <div class="info">
          <div class="title"></div>
          <p>Heartson Roswell A. Yagin<br>front-end developer</p>
        </div>
        <ul>
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </ul>
      </div>
    </div>

    <div class="wrapper">
      <div class="card front-face">
        <img src="./img/zed.jpg">
      </div>
      <div class="card back-face">
        <img src="./img/zed.jpg">
        <div class="info">
          <div class="title"></div>
          <p>Ian Flor Zedric M. Ayuyang<br>front-end developer</p>
        </div>
        <ul>
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </ul>
      </div>
    </div>

    <div class="wrapper">
      <div class="card front-face">
        <img src="./img/jv.jpg">
      </div>
      <div class="card back-face">
        <img src="./img/jv.jpg">
        <div class="info">
          <div class="title"></div>
          <p>John Vincent S. Garma<br>front-end developer</p>
        </div>
        <ul>
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </ul>
      </div>
    </div>

  </body>

<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: linear-gradient(375deg, #1cc7d0, #2ede98);
}
::selection{
  color: #fff;
  background: #1cc7d0;
}
.wrapper{
  height: 400px;
  width: 320px;
  position: relative;
  transform-style: preserve-3d;
	perspective: 1000px;
}
.wrapper .card{
  position: absolute;
  height: 100%;
  width: 100%;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  transform: translateY(0deg);
  backface-visibility: hidden;
  transform-style: preserve-3d;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
  transition: transform 0.7s cubic-bezier(0.4,0.2,0.2,1);
}
.wrapper:hover > .front-face{
  transform: rotateY(-180deg);
}
.wrapper .card img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}
.wrapper .back-face{
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  transform: rotateY(180deg);
}
.wrapper:hover > .back-face{
  transform: rotateY(0deg);
}
.wrapper .back-face img{
  height: 150px;
  width: 150px;
  padding: 5px;
  border-radius: 50%;
  background: linear-gradient(375deg, #1cc7d0, #2ede98);
}
.wrapper .back-face .info{
  text-align: center;
}
.back-face .info .title{
  font-size: 30px;
  font-weight: 500;
}
.back-face ul{
  display: flex;
}
.back-face ul a{
  display: block;
  height: 40px;
  width: 40px;
  color: #fff;
  text-align: center;
  margin: 0 5px;
  line-height: 38px;
  border: 2px solid transparent;
  border-radius: 50%;
  background: linear-gradient(375deg, #1cc7d0, #2ede98);
  transition: all 0.5s ease;
}
.back-face ul a:hover{
  color: #1cc7d0;
  border-color: #1cc7d0;
  background: linear-gradient(375deg, transparent, transparent);
}
</style>
</html>