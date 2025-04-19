<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private static $pdo;

    public static function getPDO(): PDO
    {
        if (!self::$pdo) {
            // Tải file .env
            $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2)); // Đảm bảo đường dẫn đúng
            $dotenv->load();

            // In ra giá trị các biến môi trường để kiểm tra
            var_dump($_ENV['DB_USER']);  // Kiểm tra DB_USER
            var_dump($_ENV['DB_PASS']);  // Kiểm tra DB_PASS

            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $db   = $_ENV['DB_NAME'] ?? 'ldb_duan1';
            $user = $_ENV['DB_USER'] ?? 'root';
            $pass = $_ENV['DB_PASS'] ?? 'thinh';
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối PDO: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
