<?php
include_once("group_object.php");

if(isset($_POST['submit'])) {
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
            "icon" => $icon,
			"name" => $name, 
			"description" => $description		
		); 
		$_groups_sqlhandler->insert('groups',$array);  	
        header("Location:index.php");
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

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
                <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>