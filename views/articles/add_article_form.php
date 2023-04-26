<!DOCTYPE html>
<html>
<head>
    <title>Add Article</title>
</head>
<body>
    <h1>Add Article</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <?php include 'add_article.php'; ?>
        <label for="title">title:</label>
        <input type="text" id="title" name="title"><br>
        <?php  if(isset($error_title)){
                echo $error_title;
        }  ?>
        <br>
        <label for="summary">summary:</label>
        <input type="text" id="summary" name="summary"><br>
        <?php  if(isset($error_summary)){
                echo $error_summary;
        }  ?>
        <br>
        <label for="image">image:</label>
        <input type="file" id="image" name="image"><br>
        <?php  if(isset($error_image)){
                echo $error_image;
        }  ?>
        <br>
        <label for="body">body:</label>
        <input type="text" id="body" name="body"><br>
        <?php  if(isset($error_body)){
                echo $error_body;
        }  ?>
        <br>
        <label for="user_id">User Name:</label>
        <select id="user_id" name="user_id">
            <?php
            $db = new MySqlHandler('users'); 
            if($_SESSION['type'] == 'admin') {
                $users = $db->getData();
            }
            elseif($_SESSION['type'] == 'editor'){
                $sql = "SELECT * from users WHERE type ='editor'";
                $users= $db->getResults($sql);
            }
            // Loop through users and create options for dropdown menu
            foreach ($users as $user) {
                echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" value="Submit">
        <?php  if(isset($error_message)){
                echo $error_message;
        }  ?>
        <br>
    </form>
</body>
</html>
