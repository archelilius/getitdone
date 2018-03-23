<?php
defined('__ROOT__') or define('__ROOT__', dirname(__FILE__)); 
include_once __ROOT__.'\database\dbconfig.php'; 
//    session_start();
?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html lang="en">

<head>
    <title>357 Limited</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/style.css" type="text/css"  />
</head>

<body>
    <!-- Navbar -->
    <?php include __ROOT__.'\partials\navbar.php'; ?>
    <!-- Body Title -->
    <div class="container">
        <h1>375 Limited</h1>
        <p>This is some text.</p>
    </div>
    <!-- Body Content -->
    <div class="container">
        <!-- Carousel -->
        <div class="carousel-row">
            <div id="carousel" class="carousel slide" data-ride="carousel" > <!-- style="height: 200px;width:auto;"> -->
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" > <!--style="height: 200px"> -->
                    <?php $products->getCarouselItems();?>
                    <!--
                    <div class="item active">
                        <img class="img-responsive center-block" src="http://gkoonz.com/wp-content/uploads/2013/02/placeholder.jpg" alt="Featured1">
                        <div class="carousel-caption"style="top:50%;transform:translateY(-120%);"> 
                            <h3>Featured Item 1</h3>
                            <p>This is featured item 1</p>
                        </div>
                    </div>

                    <div class="item">
                        <img class="img-responsive center-block" src="http://gkoonz.com/wp-content/uploads/2013/02/placeholder.jpg" alt="Featured2">
                        <div class="carousel-caption"style="top:50%;transform:translateY(-120%);"> 
                            <h3>Featured Item 2</h3>
                            <p>This is featured item 2</p>
                        </div>
                    </div>
                    <div class="item">
                        <img class="img-responsive center-block" src="http://gkoonz.com/wp-content/uploads/2013/02/placeholder.jpg" alt="Featured3">
                        <div class="carousel-caption"style="top:50%;transform:translateY(-120%);"> 
                            <h3>Featured Item 3</h3>
                            <p>This is featured item 3</p>
                        </div>
                    </div>
                    -->
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Featured List 1 -->
        <div class="row" style="padding-top:50px">
            <div class="container list-group">
                <div class="row text-center">
                <?php $products->getThumbItems(mt_rand(1,41)); ?>
                </div>
            </div>
        </div>
        <!-- Featured List 2 -->
         <div class="row" style="padding-top:50px">
            <div class="container list-group">
                <div class="row text-center">
                <?php $products->getThumbItems(mt_rand(1,41)); ?>
                </div>
            </div>
        </div>
        <!-- Featured List 3 -->
        <div class="row" style="padding-top:50px">
            <div class="container list-group">
                <div class="row text-center">
                <?php $products->getThumbItems(mt_rand(1,41)); ?>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Javascript  -->
    <script>
        $(document).ready(function(){
            $('#myCarousel').carousel(1);
            //    $('#Login-Form').parsley();
            //    $('#Signin-Form').parsley();
            //    $('#Forgot-Password-Form').parsley();
                

                
        });
    </script>

    
       <!-- Content Test Area  -->
       <div class="container">
	<p>Testing Section</p><br>
</div>

</body></html>