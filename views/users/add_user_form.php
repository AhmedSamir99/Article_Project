<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form method="post" action="">
    <?php include 'add_user.php'; ?>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo remember_Variable("name");?>"><br>
        <?php  if(isset($error_name)){
                echo $error_name;
        }  ?>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo remember_Variable("email");?>"><br>
        <?php  if(isset($error_email)){
                echo $error_email;
        }  ?>
        <br>
        <label for="mobilenumber">Mobile Number:</label>
        <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo remember_Variable("mobilenumber");?>"><br>
        <?php  if(isset($error_number)){
                echo $error_number;
        }  ?>
        <br>
        <label for="mobilenumber">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo remember_Variable("password");?>"><br>
        <?php  if(isset($error_password)){
            echo $error_password;
        }  ?>
        <br>
        <label for="mobilenumber">User Name:</label>
        <input type="text" id="username" name="username" value="<?php echo remember_Variable("username");?>"><br>
        <?php  if(isset($error_username)){
            echo $error_username;
        }  ?>
        <br>
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
         
        </select><br>
        <label for="group_id">Group Name:</label>
        <select id="group_id" name="group_id">
            <?php
            $dbHandler = new MySqlHandler('groups'); 
            $groups = $dbHandler->getData();

            // Loop through groups and create options for dropdown menu
            foreach ($groups as $group) {
                echo '<option value="' . $group['id'] . '">' . $group['name'] . '</option>';
            }
            ?>
        </select><br>
        
        <input type="submit" value="Submit">
        <?php if (isset($error_message)) {
            echo $error_message;
        }
        ?>
    </form>
</body>
</html>
