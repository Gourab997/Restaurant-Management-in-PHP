<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/css.css">
  <style type="text/css">
        
        body{
            background-image:url(wooden-board-empty-table-top-blurred-background_1253-1584.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

        .content{
            background: white;
            width: 50%;
            padding: 40px;
            margin: 100px auto;
            font-family: calibri;
            border-radius: 10px;
        }

        p{
            font-size: 25px;
            color: black;
        }

    </style>

	<link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body>
<div class="galleryContainer">
    <div class="slideShowContainer">
        <div id="playPause" onclick="playPauseSlides()"></div>
        <div onclick="plusSlides(-1)" class="nextPrevBtn leftArrow"><span class="arrow arrowLeft"></span></div>
        <div onclick="plusSlides(1)" class="nextPrevBtn rightArrow"><span class="arrow arrowRight"></span></div>
        <div class="captionTextHolder"><p class="captionText slideTextFromTop"></p></div>
        <div class="imageHolder">
            <img src="images/burger.jpg">1366X768
            <p class="captionText">Special Burger</p>
        </div>
        <div class="imageHolder">
            <img src="images/DclYqG-VMAA5LlK.jpg">
            <p style="color:white;"class="captionText">Thai food</p>
        </div>
        <div class="imageHolder">
            <img src="images/plain_pizza_f431dcc55520ce41f835a97a5383f171.fit-760w.jpg">
            <p style="color:white;"class="captionText">Pizza</p>
        </div>
        <div class="imageHolder">
            <img src="images/image16.jpg">
            <p style="color:white;"class="captionText">Biriyani</p>
        </div>
    </div>
    <div id="dotsContainer"></div>
</div>
 <div class="container">
        <div class="row">
          <div class="col-md-8">
          </div>
          <div class="col-md-4">
            <a href="addbooking.php" class="btn btn-primary">Make Reservation</a>
            <a href="showfood.php" class="btn btn-primary">Order food</a>
            <a href="login.php" class="btn btn-primary">Login</a>
           
          </div>
        </div>
      </div>
<script src="js/myScript.js"></script>
</body>
</html>