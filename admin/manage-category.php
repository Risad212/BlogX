<?php require_once('header.php') ?>
<?php
require_once('../vendor/autoload.php');
$cat = new \App\classes\Category();

$category = $cat->allCategory();

if (isset($_GET['active'])) {
    $id = $_GET['active'];
    $cat->active($id);
}

if (isset($_GET['inactive'])) {
    $id = $_GET['inactive'];
    $cat->inactive($id);
}
?>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                Dynamic Table
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Sl No</td>
                                <td>Category Name</td>
                                <td>Status</td>
                                <td style="width: 250px">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($category as $row) { ?>
                                <tr>
                                    <td><?= $sl; ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['status'] == 1 ? "active" : "inactive" ?></td>
                                    <td>
                                        <a href="edit-category.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil pr-1"></i>Edit</a>
                                        <a href="delete-category.php?id=<?= $row['id'] ?>&cat=cat" class="btn btn-danger btn-sm"><i class="fa fa-trash-o pr-1"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php $sl++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php require_once('footer.php') ?>