<?php
include_once("group_object.php");
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
$current_group = $_groups_sqlhandler-> get_record_by_id($id)[0];

if(isset($_POST['edit'])) {
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
			"name" => $name, 
			"description" => $description		
		); 
		$_groups_sqlhandler->update($current_group['id'],$array);  
       ?>
       <script>
    window.location.href = "groups.php";
    </script>
       <?php
	}  
}
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
<div class="container my-4 p-2">
    
    <div class="card">
        <div class="card-header d-flex justify-content-between">
		<h3>Edit Employee Details</h3>	
            <a href="index.php" class="btn btn-danger" >Back </a>
        </div>
        <div class="card-body">
        <form method="post" name="form1" enctype='multipart/form-data'>
                <div class="mb-3">
                    <label class="form-label">Group Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $current_group["name"]?>">
                </div>
                <div class="mb-3">
				<textarea  name="description" class="form-control" id="floatingTextarea" style="height: 25vh"><?php echo $current_group["description"]?>
				</textarea>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">EDIT</button>
				
            </form>
        </div>
    </div>
</div>