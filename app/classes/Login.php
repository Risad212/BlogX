<?php
namespace App\classes;

use App\classes\Database;

class Login
{
  public static  function loginCheck($data)
  {

    $username = trim($data['username']);
    $password = trim(md5($data['password']));

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

    $result = mysqli_query(Database::dbCon(), $sql);


    if ($result) {
      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        header('Location: index.php');
      } else {
        $login_error = 'username or password not valid';
        return $login_error;
      }
    } else {
      die();
    }
  }
}
