<?php
require_once '../../vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form has been submitted, process the form data
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $body = $_POST['body'];
    $userId = $_POST['user_id'];

    $targetDir = "../../images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
        exit;
    }

    // Check file size (max 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "File is too large.";
        exit;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }

       // Move uploaded file to target directory
       if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

        
        $dbHandler = new MySqlHandler('articles');
        $sql = "INSERT INTO articles (title,summary,image,body,user_id) VALUES ('$title', '$summary', '".basename($targetFile)."','$body','$userId')";
        $result = $dbHandler->executeQuery($sql);

        if ($result) {
            header("Location:../../index.php");
        } 
    } else {
        echo "Error uploading file.";
        exit;
    }

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
        <label for="summary">summary:</label>
        <input type="text" id="summary" name="summary"><br>
        <label for="image">image:</label>
        <input type="file" id="image" name="image"><br>
        <label for="body">body:</label>
        <input type="text" id="body" name="body"><br>
        <label for="user_id">User Name:</label>
        <select id="user_id" name="user_id">
            <?php
            $dbHandler = new MySqlHandler('users'); 
            $users = $dbHandler->getData();

            // Loop through users and create options for dropdown menu
            foreach ($users as $user) {
                echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
