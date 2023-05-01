<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
include_once("group_object.php");
if ($_SESSION['type'] == 'admin') {
    $groups = $_groups_sqlhandler->getData(array());
}

if ($_SESSION['type'] == 'editor') {
    $sql="SELECT * FROM groups WHERE name = 'Editors'";
    $groups = $_groups_sqlhandler->getResults($sql);
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
<style>
    .single_group{
        text-decoration:none;  
        color: black ;
    }
</style>
<body>
    <div class="container mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users "></i>Groups</h1>
          </div>
        <div class="d-flex justify-content-end mb-3 gap-1">    
            <a href="create.php"  class="btn btn-success" ><i class="fa fa-create"></i>Create New Group</a>
            <a href="restore.php"  class="btn btn-dark" ><i class="fa fa-restore"></i>All Deleted Groups</a>
        </div>
        <table id="usetTable" class="table table-striped border">
            <thead>
                <th>#</th>
                <!-- <th>Group Icon</th> -->
                <th>Group Name</th>
                <th>Group Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if(!empty($groups)) { ?>
                    
                    <?php foreach($groups as $group) { ?>
                        <tr>
                        <?php
                            if( $group['deleted_at'] == NULL) {?>
                                <td><?php echo $group['id']; ?></td>
                                <td><i><img src='../../images/group.png' class='group-icon' style='width:2vw;height:4vh'></i>&nbsp
                                <span class="fs-5"><a href="single_group.php?id=<?=$group["id"]?>" class="single_group"><?php echo $group['name']; ?></a></td>
                                <td><?php echo $group['description']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?=$group["id"]?>"  class="btn btn-info" ><i class="fa fa-edit "></i> </a>
                                    <a href="delete.php?id=<?=$group["id"]?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                </td>
                           <?php } ?>
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
            $('#usetTable').DataTable();
        } );
    </script>
<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
    ?>