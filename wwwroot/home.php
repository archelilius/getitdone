<?php
defined('__ROOT__') or define('__ROOT__', dirname(__FILE__)); 
//session_start();
include_once __ROOT__.'\database\dbconfig.php';

//$userRow=array();
if(!$user->is_loggedin())
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'registration/login.php';
    $user->redirect('http://'.$host.'/registration/login.php');  //'http://'.$host.$uri.'/'.$extra);///registration/login.php');
}
if(isset($_SESSION['user_session']))
{
$user_id = $_SESSION['user_session'];

$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/style.css" type="text/css"  />

<title>welcome - <?php if (isset($userRow['user_email'])) print($userRow['user_email']); ?></title>

<div class="header">
 <div class="left">
     <label><a href="http://357limited.azurewebsites.net">357 Limited</a></label>
    </div>
    <div class="right">
     <label><a href=<?php $user->logout(); ?> ><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
welcome : <?php if(isset($userRow['user_name']))print($userRow['user_name']); ?>
</div>

