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

    // Attempt to connect to the database
    $link = mysqli_connect($host, $user, $pass, $db);

    // Check if connection was successful
    if (!$link) {
      // If connection fails, display the error message and stop the script
      die("Database connection failed: " . mysqli_connect_error());
    }
    // If successful, return the connection link
    return $link;
  }
}
