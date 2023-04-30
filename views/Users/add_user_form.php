<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
?>
<div class="container  ">

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Add User</h3>
            <a href="all.php" class="btn btn-danger">Back </a>
        </div>
        <div class="card-body">
  <form method="post" action="">
    <?php include 'add_user.php'; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo remember_Variable("name");?>" class="form-control">
            <?php  if(isset($error_name)){
                echo $error_name;
            }  ?>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo remember_Variable("email");?>" class="form-control">
            <?php  if(isset($error_email)){
                echo $error_email;
            }  ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="mobilenumber" class="form-label">Mobile Number:</label>
            <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo remember_Variable("mobilenumber");?>" class="form-control">
            <?php  if(isset($error_number)){
                echo $error_number;
            }  ?>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo remember_Variable("password");?>" class="form-control">
            <?php  if(isset($error_password)){
                echo $error_password;
            }  ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="username" class="form-label">User Name:</label>
            <input type="text" id="username" name="username" value="<?php echo remember_Variable("username");?>" class="form-control">
            <?php  if(isset($error_username)){
                echo $error_username;
            }  ?>
        </div>
        <div class="col-md-6">
            <label for="type" class="form-label">Type:</label>
            <select id="type" name="type" class="form-select">
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="user">User</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="group_id" class="form-label">Group Name:</label>
            <select id="group_id" name="group_id" class="form-select">
                <?php
                $dbHandler = new MySqlHandler('groups'); 
                $groups = $dbHandler->getData();

                // Loop through groups and create options for dropdown menu
                foreach ($groups as $group) {
                    echo '<option value="' . $group['id'] . '">' . $group['name'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        <div class="col-md-6">
            <?php if (isset($error_message)) {
                echo $error_message;
            }
            ?>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>