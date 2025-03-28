<?php

namespace App\classes;

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


class Database
{
  public static function dbCon()
  {
    $host = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    $db = getenv('DB_NAME');
    return $host;
    //   try {
    //     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable exception mode
    //     $link = mysqli_connect($host, $user, $pass, $db);
    //     return $link;
    //   } catch (mysqli_sql_exception $e) {
    //     die("Database connection failed: " . $e->getMessage());
    //   }
  }
}
