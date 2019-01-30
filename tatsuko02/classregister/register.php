<?php
//基本的な設定情報
require '../functions.php';
require '../model/Model.php';


//値の受け取り
$params = array(
    'class_name'=>$_POST["classname"],
    'capacity'=>$_POST["capacity"]
);
$tableName = 'class_table';

$course = new Model($tableName, $params);
$course->store();
header('Location: index.php');


?>