<?php
defined('BASE_PATH') or die("Permission Denied");


$Database_Config = (object)[
    'HOST' => 'localhost',
    'DB' => 'maps',
    'USER' => 'root',
    'PASS' => ''
];


$dsn = "mysql:dbname={$Database_Config->DB};host={$Database_Config->HOST}";
try {
    $pdo = new PDO($dsn, $Database_Config->USER, $Database_Config->PASS);
} catch (PDOException $e) {
    diePage($e->getMessage()."-- PLEASE CHECK bootstrap/config.php --");
}