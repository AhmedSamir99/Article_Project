<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
include_once("group_object.php");


if(isset($_POST['create'])) {
    $icon = "<i><img src='../../images/group.png'style='width:2vw;height:4vh'></i>";
	$name = ($_POST['name']);
	$description = $_POST['description'];	
	$emptyInput = $_groups_sqlhandler->check_empty($_POST, array('name', 'description'));

    if($emptyInput){
        echo    '<h5 style="text-align:center; color:red; padding:2%">'
                    .$emptyInput.
                '</h5>';
    }
    
	else{
		$array = array( 
            // "icon" => "<i class='bi bi-people-fill fs-3'></i>",
            
			"name" => $name, 
			"description" => $description	
		); 
		$_groups_sqlhandler->insert($array);  	
        ?>
       <script>
    window.location.href = "index.php";
    </script>
       <?php
	}  
}
?>
<div class="container my-4 p-2">
    
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Group Add</h3>
            <a href="index.php" class="btn btn-danger" >Back </a>
        </div>
        <div class="card-body">
        <form method="post" name="form1" enctype='multipart/form-data'>
                <div class="mb-3">
                    <label class="form-label">Group Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Leave a description here....." id="floatingTextarea" style="height: 25vh"></textarea>
                </div>
                <button type="submit" name="create" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>