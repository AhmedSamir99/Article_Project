<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
?>
   

<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h3>Add Article</h3>
      <a href="all.php" class="btn btn-danger">Back</a>
    </div>
    <div class="card-body">
      <form method="post" action="" enctype="multipart/form-data">
        <?php include 'add_article.php'; ?>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo remember_Variable('title');?>" class="form-control">
            <?php if(isset($error_title)){ echo $error_title;}?>
          </div>
          <div class="col-md-6">
            <label for="summary" class="form-label">Summary:</label>
            <input type="text" id="summary" name="summary" value="<?php echo remember_Variable('summary');?>" class="form-control">
            <?php if(isset($error_summary)){ echo $error_summary;}?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="image" class="form-label">Image:</label>
            <input type="file" id="image" name="image" class="form-control">
            <?php if(isset($error_image)){ echo $error_image;}?>
          </div>
          <div class="col-md-6">
            <label for="user_id" class="form-label">User Name:</label>
            <select id="user_id" name="user_id" class="form-select">
              <?php
              $db = new MySqlHandler('users');
              if($_SESSION['type'] == 'admin') {
                  $users = $db->getData();
              }elseif($_SESSION['type'] == 'editor'){
                  $sql = "SELECT * from users WHERE type ='editor'";
                  $users = $db->getResults($sql);
              }
              foreach ($users as $user) {
                  echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="body" class="form-label">Body:</label>
            <textarea id="body" name="body" class="form-control"><?php echo remember_Variable('body');?></textarea>
            <?php if(isset($error_body)){ echo $error_body;}?>
          </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <?php if(isset($error_message)){ echo $error_message;}?>
      </form>
    </div>
  </div>
</div>
<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>
