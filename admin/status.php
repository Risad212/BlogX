<?php
require_once('../vendor/autoload.php');
$cat = new \App\classes\Category();

if(isset($_GET['active']) && isset($_GET['cat'])){
    $id = $_GET['active'];
    $cat->active($id);
    header("Location: manage-category.php");
  }
  
  if(isset($_GET['inactive']) && isset($_GET['cat'])){
      $id = $_GET['inactive'];
      $cat->inactive($id);
      header("Location: manage-category.php");
}