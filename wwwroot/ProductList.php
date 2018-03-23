<?php defined('__ROOT__') or define('__ROOT__', dirname(__FILE__)); 
include_once __ROOT__.'\database\dbconfig.php'; 
$category = $_GET['Category'];
$categoryName = $products->getCategoryName($category);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html lang="en">

<head>
    <title>357 Limited - <?php echo ($categoryName) ?></title>
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

<div>
<H3>Category <span class="glyphicon glyphicon-chevron-right"></span> <?php echo($categoryName) ?></H3>
<p></p>
<?php $products->getProductItems($category); ?>


</body>
</html>
