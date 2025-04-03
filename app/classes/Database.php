<?php

namespace App\classes;

// Include Composer autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// Use the Dotenv class
use Dotenv\Dotenv;

// Load the .env file from the root of the project
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Path to the root directory
$dotenv->load();


class Database
{
  public static function dbCon()
  {
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $db   = $_ENV['DB_NAME'];

    try {
      $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
