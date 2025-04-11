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
    try {
      $conn = Database::dbCon(); // Database connection
      $sql = "SELECT * FROM `category`";
      $stmt = $conn->prepare($sql);  // Prepare the SQL statement
      $stmt->execute();  // Execute the query

      // Fetch all categories as an associative array
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $categories;  // Return the result
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();  // Handle potential errors
      return null;  // Return null if there is an error
    }
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
