<?php

namespace App\classes;

use App\classes\Database;
use PDO;
use PDOException;

class Login
{
  public static function loginCheck($data)
  {
    $username = trim($data['username']);
    $password = trim($data['password']);

    try {
      $conn = Database::dbCon();
      // Fetch user by username
      $sql = "SELECT * FROM users WHERE username = :username";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row) {
        if (password_hash($password, PASSWORD_DEFAULT)) {
          session_start();
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['name'] = $row['name'];
          header('Location: index.php');
          exit();
        } else {
          return 'Password is incorrect!';
        }
      } else {
        return 'Username not found!';
      }
    } catch (PDOException $e) {
      return 'SQL Error: ' . $e->getMessage();
    }
  }
}
