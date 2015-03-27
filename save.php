<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mysql = new MySQLi('localhost', 'root', '', 'test');

$data = file_get_contents("php://input");
$objData = json_decode($data);

$value = $objData->message_to_save;
$value = mysqli_real_escape_string($mysql, $value);

$req = 'INSERT INTO debug (debug_message) VALUES ("'.$value.'")';

mysqli_query($mysql, $req) or die (mysqli_error($mysql));

$mysql->close();

?>

