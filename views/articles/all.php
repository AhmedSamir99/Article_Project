<?php
$articles= $articles->getData(array());
?>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
    />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">    
            <a href="views/articles/add.php" class="btn btn-success" ><i class="fa fa-create"></i>Create New Article</a>
        </div>
        <table id="articleTable" class="table table-striped border">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Summary</th>
                <th>image</th>
                <th>Body</th>
                <th>User Id</th>
                <th>publish DATE</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if(!empty($articles)) { ?>
                    
                    <?php foreach($articles as $article) { ?>
                        <tr>
                            <td><?php echo $article['id']; ?></td>
                            <td><?php echo $article['title']; ?></td>
                            <td><?php echo $article['summary']; ?></td>
                            <td><img src="<?php echo "images/" .$article["image"]; ?>" style="height:50px ;width: 50px"></td>
                            <td><?php echo $article['body']; ?></td>
                            <td><?php echo $article['user_id']; ?></td>
                            <td><?php echo $article['publish_date']; ?></td>
                            <td>
                                <a href="#" onclick="confirmDelete(<?php echo $article['id']; ?>)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
 <script>
        $(document).ready(function() {
            $('#articleTable').DataTable();
        } );
    </script>

<script>
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this article?")) {
    window.location.href = "views/articles/delete_article.php?id=" + id + "&confirm=true";
  }
}
</script>

</body>


