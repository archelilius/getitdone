<?php 
defined('__ROOT__') or define('__ROOT__', dirname(dirname(__FILE__))); 
require_once __ROOT__.'\database\dbconfig.php'; 

session_start();
$page = $_POST['page']
$uname = trim($_POST['uname']);
$umail = trim($_POST['umail']);
$upass = trim($_POST['upass']); 

switch($_GET["action"])
{
    case 'signup':
    {
        if($user->is_loggedin())
        {
            $user->redirect($page);
        }
        break;
    }
    case 'signin':
    {
        break;
    }
    default:
        break;
}

?>