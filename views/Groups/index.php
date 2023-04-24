<?php

include_once("group_object.php");
$groups = $_groups_sqlhandler->getRecords(array());

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
            <a href="create.php"  class="btn btn-success" ><i class="fa fa-create"></i>Create New Group</a>
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
                            <td><?php echo $group['id']; ?></td>
                            <!-- <td><img src="<?php echo "../../images/" .$group["icon"]; ?>" height="40vh"></td> -->
                            <td><?php echo $group['icon']; ?>&nbsp
                            <span class="fs-5"><?php echo $group['name']; ?></td>
                            <td><?php echo $group['description']; ?></td>
                            <td>
                                <a href="edit.php?id=<?=$group["id"]?>"  class="btn btn-info" ><i class="fa fa-edit"></i>Edit </a>
                                <a href="#" class="btn btn-danger" ><i class="fa fa-trash"></i>Delete</a>
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
            $('#usetTable').DataTable();
        } );
    </script>
</body>
