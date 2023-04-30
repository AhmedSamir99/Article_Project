<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 
require_once '../../vendor/autoload.php'; 

$db= new MySqlHandler('articles');

$id = (isset ($_GET["id"]))? intval ($_GET["id"]) : 0;
$current_item = $db->getRecordById($id)[0];

// $sql = "SELECT a.*, u.name as user_name FROM articles a JOIN users u ON a.user_id = u.id";

$sql="
SELECT a.*, u.name as user_name
FROM articles a
JOIN users u ON a.user_id = u.id
WHERE a.id = $id
";



$users = $db->getResults($sql);

// var_dump($users[0]);

?>


<section class="container p-5">
    
    <div class="card mb-3">
            <div class="card-header fs-3 d-flex justify-content-between">
                Article Info
                <a href="all.php" class="btn btn-danger" >Back </a>
            </div>
            <div class="card-body">
                <h5 class="fs-4">
                </h5>
                <p class="fs-5"><?php echo "<span class='fs-3'> Title: </span>" . $current_item["title"];?></p>
                <p class="fs-5"><?php echo "<span class='fs-3'> Body: </span>" . $current_item["body"];?></p>
                <p class="fs-5"><?php echo "<span class='fs-3'> Summary: </span>" . $current_item["summary"];?></p>
                <img src="<?php echo "../../images/" .$current_item["image"]; ?>" style="height:350px">
                <p class="fs-5"><?php echo "<span class='fs-3'> Publish date: </span>" . $current_item["publish_date"];?></p>
            </div>
    </div>

    <div class="card mb-3">
            <div class="card-header fs-4">
                Owner Article Info
            </div>
            <div class="card-body">
                <p class="fs-5"><?php echo "<span class='fs-3'> Username: </span>" . $users[0]["user_name"];?></p>
            </div>
    </div>

</section>

<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
?>