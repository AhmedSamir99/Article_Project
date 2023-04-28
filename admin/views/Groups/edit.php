<?php
include(__DIR__ . '\..\..\includes\header.php');
include(__DIR__ . '\..\..\includes\navbar.php');
include_once("group_object.php");
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