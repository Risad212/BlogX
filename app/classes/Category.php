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


  public function delete($id)
  {
    try {
      $conn = Database::dbCon();
      $sql = "DELETE FROM category WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      if ($stmt->execute()) {
        echo " category deleted successfully.";
      } else {
        echo "Failed to delete category.";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function getCategoryById($id)
  {
    try {
      $conn = Database::dbCon();
      $sql = "SELECT * FROM category WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function updateCategory($data)
  {
    $id = $data['category_id'];
    $category_name = $data['category_name'];
    $status = $data['status'];
    try {
      $conn = Database::dbCon();

      $sql = "UPDATE category SET category_name = :category_name, status = :status WHERE id = :id";
      $stmt = $conn->prepare($sql);

      $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
      $stmt->bindParam(':status', $status, PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      if ($stmt->execute()) {
        return "Category updated successfully.";
      } else {
        return "Failed to update category.";
      }
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }
}
