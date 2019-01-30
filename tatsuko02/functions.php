<?php
require 'config/env.php';

function db(){

    $db       = DB_DBNAME;
    $host     = DB_HOSTNAME;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    try {
        $conn = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo 'データベースに接続できません！アプリの設定を確認してください。';
        exit;
    }
    
    return $conn;
}


function quote_sql($string){
    $quote_str = '`';
    return $quote_str.str_replace($quote_str, '', $string).$quote_str;
}

function h($data){
    return htmlspecialchars($data,ENT_QUOTES);
}

?>