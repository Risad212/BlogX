<?php
require_once('../vendor/autoload.php');
$category = new \App\classes\Category();

if (isset($_GET['cat'])) {
    $id = $_GET['id'];
    $category->delete($id);
    header("Location: manage-category.php");
}
