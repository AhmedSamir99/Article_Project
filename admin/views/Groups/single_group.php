<?php

include_once("group_object.php");
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
$current_group = $_groups_sqlhandler-> get_record_by_id($id)[0];
$_users_sqlhandler = new MySQLHandler("users");
$users = $_users_sqlhandler->getRecords(array());

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

<div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h2><i><img src='images/group.png' class='group-icon' style='width:2vw;height:4vh'></i>&nbsp
        <span class="fs-2"><?php echo $current_group['name']; ?></h2>
      </div>
<div class='container'>
    
    <p class="fs-3"><?php echo $current_group['description']; ?></p>

    <div class="card" style="width: 20rem;">
        <div class="card-header">
            <h4 class="fs-5">Users For this Groups are: </h4>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach($users as $user) { 
                if($current_group['id'] == $user['group_id']) { ?>
                    <li class="list-group-item fs-5"><?php echo $user['name']; ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>