<?php

$database_host='localhost';
$database_username='root';
$database_password='';
$database_name='class_site';

$conn=new mysqli($database_host,$database_username,$database_password,$database_name);

function formatDate($date){
  //return date('F j,Y, g:i a',strtotime($date));
  return date('g:i a',strtotime($date));
}

 ?>
