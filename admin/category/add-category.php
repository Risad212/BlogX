<?php require_once('header.php') ?>
<?php
  require_once('../vendor/autoload.php');

  $category = new \App\classes\Category();

  if(isset($_POST['add-category'])){
     $insertMeg = $category->addCategory($_POST);
  }
?>
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
                      <section class="card">
                          <header class="card-header">
                              Category Add Form
                          </header>
                          <div class="card-body">
                              <?php
                                if(isset($insertMeg)){ ?>
                                  <h5  class="text-center"><?= $insertMeg ?></h5>
                              <?php }?>
                              <form action="" method="POST">
                                  <div class="form-group row">
                                      <label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name">
                                      </div>
                                  </div>
                                  <fieldset class="form-group">
                                      <div class="row">
                                          <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                                          <div class="col-sm-8">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                                  <label class="form-check-label" for="active">Active</label>
                                              </div>
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                                  <label class="form-check-label" for="inactive">Inactive</label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
                                  <div class="form-group row">
                                      <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary" name="add-category">Save</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>

                  </div>
</div>
<?php require_once('footer.php') ?>