<?php
/**
 * Hostinger Database Connection (PDO)
 * Project: medical landing
 */

$servername = "localhost";

/*
|--------------------------------------------------------------------------
| Hostinger Database Credentials
|--------------------------------------------------------------------------
| hPanel screenshot অনুযায়ী
|
| Database Name : u463122706_madical_name
| Username      : u463122706_madical_user
| Password      : 4Nb>R>7x@K5
|
*/

$username = "root";
$password = "";
$dbname   = "medical_landing";

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    die("❌ Database Connection Failed: " . $e->getMessage());
}
