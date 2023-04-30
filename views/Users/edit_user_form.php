<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
?>
<div class="container my-4 p-2">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Edit User</h3>    
            <a href="all.php" class="btn btn-danger" >Back </a>
        </div>
        <div class="card-body">
            <form method="POST" action="update_user.php">
                <?php include 'edit_user.php'; ?>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                        <?php if(isset($error_name)) {
                                echo $error_name;
                            } 
                        ?>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
                    </div>
                    <div class="col">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" name="mobile_number" value="<?php echo $user['mobile_number']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="group_id" class="form-label">Group ID:</label>
                        <select id="group_id" name="group_id" class="form-control">
                            <?php
                                foreach ($groups as $group) {
                                    $selected = ($group['name'] == $userGroupName)? 'selected' : '';
                                    echo '<option value="' . $group['id'] . '" ' . $selected . '>' . $group['name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="type" class="form-label">Type:</label>
                        <select id="type" name="type" class="form-control">
                            <option value="admin" <?php if($user['type'] == "admin") echo "selected"; ?>>Admin</option>
                            <option value="editor" <?php if($user['type'] == "editor") echo "selected"; ?>>Editor</option>
                            <option value="user" <?php if($user['type'] == "user") echo "selected"; ?>>User</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>