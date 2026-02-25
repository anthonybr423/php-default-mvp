<?php
function getConnection(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $servername = env('DB_HOST');
        $username   = env('DB_USER');
        $password   = env('DB_PASS');
        $dbname     = env('DB_DATABASE');

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    return $pdo;
}
