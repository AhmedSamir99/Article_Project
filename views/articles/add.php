<?php
require_once '../../vendor/autoload.php'; 
session_start();

// $error
$error_title="";
$error_summary="";
$error_body="";
$error_image="";
$error_message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST['title']) || empty($_POST['summary']) || empty($_POST['body']) || empty($_POST['user_id']) || empty($_FILES["image"]) || empty($_FILES["image"]["name"])) {
        
        $error_message = "All fields are required";
    }        
    
    
    
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $body = $_POST['body'];
    $userId = $_POST['user_id'];



    
    
    

    $targetDir = "../../images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if($imageFileType){ 
        $check = getimagesize($_FILES["image"]["tmp_name"]);


    if ($check === false) {
        $error_image = "File is not an image.";
        // exit;
    }

    // Check file size (max 5MB)
    if ($_FILES["image"]["size"] > Image_MAX_SIZE) {
        $error_image = "File is too large.";
        // exit;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error_image = "Only JPG, JPEG, PNG & GIF files are allowed.";
        // exit;
    }
    
}
    if(strlen($title) > MAX_LENGTH){
        $error_title = "Title is too long";
    }
    elseif(strlen($title) < MIN_LENGTH){
        $error_title = "Title is too short";
        // echo "Ana henaaa";
    }
    if(strlen($summary) > SUMMARY_MAX_LENGTH){
        $error_summary = "Summary is too long";
    }
    elseif(strlen($summary)< SUMMARY_MIN_LENGTH){
        $error_summary = "Summary is too short";
    }
    if(strlen($body) > body_MAX_LENGTH){
        $error_body = "Body is too long";
    }
    elseif(strlen($body) < body_MIN_LENGTH){
        $error_body = "Body is too short";
    }

       // Move uploaded file to target directory
       if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

            if($error_title =="" && $error_summary =="" && $error_body =="" && $error_image =="" && $error_message ==""){
            
               $dbHandler = new MySqlHandler('articles');
               $sql = "INSERT INTO articles (title,summary,image,body,user_id) VALUES ('$title', '$summary', '".basename($targetFile)."','$body','$userId')";
               $result = $dbHandler->executeQuery($sql);

            if ($result) {
            header("Location:all.php");
            } 
        }
    } 
    // else {
    //     echo "Error uploading file.";
    //     exit;
    // }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Article</title>
</head>
<body>
    <h1>Add Article</h1>
    <form method="post" action="" enctype="multipart/form-data">
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
