<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 
require_once '../../vendor/autoload.php'; 
$articles= new MySqlHandler("articles");

//check first if the user is logged in
if(isset($_SESSION["logged"]) ==true) {
    if ($_SESSION['type'] == 'admin') {
        $articles= $articles->getData(array());
    } elseif($_SESSION['type'] == 'editor') {
        var_dump($_SESSION['type']); // if the user was editor, then get the articles belongs to the users with group id =2 (editor group)
        $sql = "SELECT a.*
        FROM articles a
        JOIN users u ON a.user_id = u.id
        WHERE u.group_id = 2";
        $articles = $articles->getResults($sql);
    }
}
else{
    die ("you are not allowed to see this page");
}

?>
    
    <div class="container mt-5  ">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-newspaper "></i>Articles</h1>
          </div>
        <div class="d-flex justify-content-end mb-3 gap-1">    
            <a href="add_article_form.php" class="btn btn-success" ><i class="fa fa-create"></i>Create New Article</a>
            <a href="restore.php"  class="btn btn-dark" ><i class="fa fa-restore"></i>All Deleted Articles</a>
        </div>
        <table id="articleTable" class="table table-striped border ">
            <thead>
                <th>#</th>
                <th>Title</th>
                <!-- <th>Summary</th> -->
                <th>image</th>
                <!-- <th>Body</th> -->
                <th>User Id</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if(!empty($articles)) { ?>
                    
                    <?php foreach($articles as $article) { ?>
                        <tr>
                            <?php
                                if( $article['deleted_at'] == NULL) {?>
                                <td><?php echo $article['id']; ?></td>
                                <td><?php echo $article['title']; ?></td>
                                <!-- <td><?php echo $article['summary']; ?></td> -->
                                <td><img src="<?php echo "../../images/" .$article["image"]; ?>" style="height:50px ;width: 50px"></td>
                                <!-- <td><?php echo $article['body']; ?></td> -->
                                <td><?php echo $article['user_id']; ?></td>
                                <td><?php echo $article['publish_date']; ?></td>
                                <td>
                                <a href="delete_article.php?id=<?=$article["id"]?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                    <!-- <a href="delete_user.php?id=<?=$user["id"]?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a> -->
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

     <script>
        $(document).ready(function() {
            $('#usetTable').DataTable();
        } );
    </script>

<script>
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this article?")) {
    window.location.href = "delete_article.php?id=" + id + "&confirm=true";
  }
}
</script>

    <?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>
 