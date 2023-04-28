<?php
include(__DIR__ . '\..\..\includes\header.php');
include(__DIR__ . '\..\..\includes\navbar.php');
include_once(__DIR__ . '\group_object.php');
$groups = $_groups_sqlhandler->getRecords(array());

?>

    <div class="container mt-5 ">
        <div class=" d-flex justify-content-end mb-3">    
            <a href="create.php" class="btn btn-success"><i class="bi bi-plus"></i>Create New Group</a>
        </div>
        <table id="groupTable" class="table table-striped border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Group Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($groups)) { ?>
                    <?php foreach ($groups as $group) { ?>
                        <tr>
                            <td><?php echo $group['id']; ?></td>
                            <td>
                                <?php echo $group['icon']; ?>&nbsp;
                                <span class="fs-5"><?php echo $group['name']; ?></span>
                            </td>
                            <td><?php echo $group['description']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info edit-group" data-group-id="<?php echo $group['id']; ?>"><i class="bi bi-pencil"></i>Edit</a>
                                <a href="#" class="btn btn-danger delete-group" data-group-id="<?php echo $group['id']; ?>"><i class="bi bi-trash"></i>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#groupTable').DataTable();

            $('.edit-group').click(function(e) {
                e.preventDefault();
                var groupId = $(this).data('group-id');
                // Redirect to edit page with the group ID
                window.location.href = 'edit.php?id=' + groupId;
            });

            $('.delete-group').click(function(e) {
                e.preventDefault();
                var groupId = $(this).data('group-id');
                // Show confirmation dialog and delete the group if confirmed
                if (confirm('Are you sure you want to delete this group?')) {
                    // Delete the group using AJAX or form submission
                }
            });
        });
    </script>
<?php
include(__DIR__ . '\..\..\includes\scripts.php');
include(__DIR__ . '\..\..\includes\footer.php');
?>