<?php
require_once('../vendor/autoload.php');
$cat = new \App\classes\Category();

if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->delete($id);
    header("Location: manage-category.php");
}