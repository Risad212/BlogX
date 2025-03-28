<?php

namespace App\classes;
use App\classes\Database;

class Category{
    public function addCategory($data){

      $category_name = $data['category_name'];
      $status = $data['status'];

      $sql = "INSERT INTO `category`(`category_name`, `status`) VALUES('$category_name', '$status')";

      $result = mysqli_query(Database::dbCon(),$sql);
      if($result){
         return $insertMSG = 'Category save Sucessfully !';
      }else{
        return $insertMSG = 'Category Not save !';
      }
    }


    public function allCategory(){
       $sql = "SELECT * FROM `category`";
       $result = mysqli_query(Database::dbCon(),$sql);
       return $result;
    }


    public function active($id){
      mysqli_query(Database::dbCon(), "UPDATE `category` SET  `status` = 1 WHERE `id` = '$id'");
    }

    public function inactive($id){
      mysqli_query(Database::dbCon(), "UPDATE `category` SET  `status` = 0 WHERE `id` = '$id'");
    }

    public function delete($id){
      mysqli_query(Database::dbCon(), "DELETE FROM `category` WHERE `id` = '$id'");
    }
}