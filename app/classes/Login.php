<?php
namespace App\classes;

use App\classes\Database;
use PDO;

class Login
{
  public static function loginCheck($data)
  {
    $username = trim($data['username']);
    $password = trim($data['password']); // Do NOT hash passwords manually

    try {
      $conn = Database::dbCon();

      // Use Prepared Statement to prevent SQL Injection
      $sql = "SELECT * FROM users WHERE username = :username";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Verify hashed password
      if ($row && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        header('Location: index.php');
        exit();
      } else {
        return 'Username or password is incorrect!';
      }
    } catch (PDOException $e) {
      return 'SQL Error: ' . $e->getMessage();
    }
  }
}
