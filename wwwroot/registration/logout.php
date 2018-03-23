<?
defined('__ROOT__') or define('__ROOT__', dirname(dirname(__FILE__))); 

session_start();
unset($_SESSION['user_session']);

header('Location: '.__ROOT__.'\index.php");
?>