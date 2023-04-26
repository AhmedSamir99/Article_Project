<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="update_user.php">
    <?php include 'edit_user.php'; ?>
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
    <?php  if(isset($error_name)){
            echo $error_name;
        }  ?>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
    <label for="mobile_number">Mobile Number:</label>
    <input type="text" name="mobile_number" value="<?php echo $user['mobile_number']; ?>"><br>
    <label for="group_id">Group ID:</label>
<select id="group_id" name="group_id">
    <?php
    foreach ($groups as $group) {
        $selected = ($group['name'] == $userGroupName)? 'selected' : '';
        echo '<option value="' . $group['id'] . '" ' . $selected . '>' . $group['name'] . '</option>';
    }
    ?>
</select><br>
<label for="type">Type:</label>
<select id="type" name="type">
    <option value="admin" <?php if($user['type'] == "admin") echo "selected"; ?>>Admin</option>
    <option value="editor" <?php if($user['type'] == "editor") echo "selected"; ?>>Editor</option>
    <option value="user" <?php if($user['type'] == "user") echo "selected"; ?>>User</option>
</select><br>

    <input type="submit" value="Update" />
</form>

</body>
</html>