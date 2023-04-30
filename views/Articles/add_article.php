<?php
require_once '../../vendor/autoload.php'; 
require_once 'article_validation.php';


$error_title=$error_summary=$error_body=$error_image=$error_message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST['title']) || empty($_POST['summary']) || empty($_POST['body']) || empty($_POST['user_id']) || empty($_FILES["image"]) || empty($_FILES["image"]["name"])) {
        
        $error_message = "All fields are required";
    }        
 
 
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $body = $_POST['body'];
    $userId = $_POST['user_id'];

    $error_title = validateTitle($title);
    $error_summary = validateSummary($summary);
    $error_body = validateBody($body);
    $error_image = validateImage($_FILES["image"]);


    $targetDir = "../../images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        // Move uploaded file to target directory
       if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

            if($error_title =="" && $error_summary =="" && $error_body =="" && $error_image =="" && $error_message ==""){
            
               $dbHandler = new MySqlHandler('articles');
               $sql = "INSERT INTO articles (title,summary,image,body,user_id) VALUES ('$title', '$summary', '".basename($targetFile)."','$body','$userId')";
               $result = $dbHandler->executeQuery($sql);

            if ($result) {
                ?>
                <script>
                    window.location.href="all.php";
                </script>
                <?php
            } 
        }
    } 
}
?>
