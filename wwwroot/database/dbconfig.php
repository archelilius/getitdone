<?php
defined('__ROOT__') or define('__ROOT__', dirname(dirname(__FILE__))); 
session_start();

class myPDO extends PDO 
{
    function query($query, $values=null)
    {
        if($query == "")
            return false;
            
        if($sth = $this->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL)))
        {
            $res = ($values) ? $sth->execute($values) : $sth->execute();
            if(!$res)
                return false;
        }            
        return $sth;
    }
}

$DB_host = "tcp:357ltddbserver.database.windows.net,1433";
$DB_user = "JJthescot";
$DB_pass = "JJd45c0t";
$DB_name = "357LtdDB";

try
{
     $DB_con = new PDO("sqlsrv:server={$DB_host};Database={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

include_once __ROOT__.'\database\class.user.php';//dirname(dirname(__FILE__)).'class.user.php';
$user = new USER($DB_con);
include_once __ROOT__.'\database\class.products.php';//dirname(dirname(__FILE__)).'class.user.php';
$products = new PRODUCTS($DB_con);