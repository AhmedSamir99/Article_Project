<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
include_once("group_object.php");
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
$current_group = $_groups_sqlhandler-> getRecordById($id)[0];
$_users_sqlhandler = new MySqlHandler("users");
$users = $_users_sqlhandler->getData(array());

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

<div class='container d-flex flex-column align-items-center justify-content-center'>
    <div class="border p-5 shadow mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2><i><img src='../../images/group.png' class='group-icon' style='width:2vw;height:4vh'></i>&nbsp
            <span class="fs-2"><?php echo $current_group['name']; ?></h2>
        </div>
        <p class="fs-3"><?php echo $current_group['description']; ?></p>
    </div>
    <div class='container d-flex flex-column align-items-center border-top p-3'>
    <h2 class="fs-2 fst-italic p-2">Users For This Group:</h2>
    <table class="table border card-body">
        <thead class="fs-5">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile_Number</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($groups)) { 
            foreach($users as $user) { 
                if($current_group['id'] == $user['group_id']) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['mobile_number']; ?></td>
                        <?php } ?>
                    </tr>
                <?php } 
                } else { ?>
                    <tr class='col-8'>
                        <td><?php echo "No Users fot theis group"; ?></td>
                    </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
?>