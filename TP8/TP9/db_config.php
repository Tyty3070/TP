<?php
$host = 'localhost'; 
$dbname = 'c41B1WEBBERTHEAU'; 
$user = 'c41trystan';
$pass = 'Test1234.'; 
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>