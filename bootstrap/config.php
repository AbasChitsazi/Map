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


$Admin_Config = [
    'admin' => [
        'pass' => '$2y$10$83EBNyAWsFAqvfHsiKFl6OrBPPpidabDCOv1VWpMcGnKDmC2JhI9W',
        // pass => 789
        'show_name' => "ادمین",
        'id' => 1
    ],
    'abbas' => [
        'pass' => '$2y$10$B.mGQlP/Vxrijg7qYakE4OsbGBFBoSzrOW9.IMxnVwAShpJpWcal2',
        // pass => abbas
        'show_name' => "عباس",
        'id' => 1
    ]
];