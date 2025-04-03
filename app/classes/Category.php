<?php

namespace App\classes;

use App\classes\Database;
use PDO;


class Category
{
  public function addCategory($data)
  {
    $category_name = $data['category_name'] ?? null;
    $status = $data['status'] ?? null;

    try {

      // database connection
      $conn = Database::dbCon();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql statement
      $sql = "INSERT INTO category (category_name, status) VALUES (:category_name, :status)";
      $stmt = $conn->prepare($sql);

      // Bind parameters
      $stmt->bindParam(':category_name', $category_name);
      $stmt->bindParam(':status', $status, PDO::PARAM_INT);

      if ($stmt->execute()) {
        echo "Category Added Successfully!";
      } else {
        echo "Failed to Insert Data!";
      }
    } catch (PDOException $e) {
      echo "SQL Error: " . $e->getMessage();
    }
  }


  public function allCategory()
  {
    $sql = "SELECT * FROM `category`";
    $result = mysqli_query(Database::dbCon(), $sql);
    return $result;
  }


  public function active($id)
  {
    mysqli_query(Database::dbCon(), "UPDATE `category` SET  `status` = 1 WHERE `id` = '$id'");
  }

  public function inactive($id)
  {
    mysqli_query(Database::dbCon(), "UPDATE `category` SET  `status` = 0 WHERE `id` = '$id'");
  }

  public function delete($id)
  {
    mysqli_query(Database::dbCon(), "DELETE FROM `category` WHERE `id` = '$id'");
  }
}
