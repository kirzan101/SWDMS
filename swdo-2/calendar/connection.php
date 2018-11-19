<?php
try
{
	$connection = new PDO('mysql:host=localhost;dbname=swdo;charset=utf8', 'root', ''); // add the password inside the ''
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
