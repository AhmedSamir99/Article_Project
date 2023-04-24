<?php
$users= $db->getData(array());
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
            <a href="views/add.php" class="btn btn-success" ><i class="fa fa-create"></i>Create New user</a>
        </div>
        <table id="usetTable" class="table table-striped border">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Mobile Number</th>
                <th>group Id</th>
                <th>Type</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if(!empty($users)) { ?>
                    
                    <?php foreach($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['mobile_number']; ?></td>
                            <td><?php echo $user['group_id']; ?></td>
                            <td><?php echo $user['type']; ?></td>
                            <td>
                                <a href="#"  class="btn btn-info" ><i class="fa fa-edit"></i>Edit </a>
                        
                                <a href="views/delete_user.php?id=<?php echo $user['id']; ?>&confirm=true" class="btn btn-danger">Delete</a>

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


