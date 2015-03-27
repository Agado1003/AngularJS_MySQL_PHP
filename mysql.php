<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mysql = new MySQLi('localhost', 'root', '', 'test');

$req = 'SELECT * FROM debug ORDER BY debug_id';
$result = $mysql->query($req) or die (mysqli_error($mysql));

$data = '[';
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($data != "[") {$data .= ",";}
    $data .= '{"debug_id":"'.$rs['debug_id'].'","debug_message":"'.$rs['debug_message'].'"}';
}

$mysql->close();
$data .= ']';

echo $data;
?>
