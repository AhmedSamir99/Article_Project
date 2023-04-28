<?php
session_start();
require_once '../../vendor/autoload.php'; 
$db = new MySqlHandler('');

//check first if the user is logged in
if(isset($_SESSION["logged"]) ==true) {
    if ($_SESSION['type'] == 'admin') {
    //if the user was admin , then get all the users
        try {
            //join groups table to i can get the group name instead of group id
            $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";
            $users = $db->getResults($sql);
        } catch(Exception $e) {
            die("An error occurred while processing your request. Please try again later.");
        }

    } elseif($_SESSION['type'] == 'editor') {
  //if the user was editor , then get the users with type editor
        try {
            $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id WHERE u.type ='editor'";
            $users = $db->getResults($sql);
        } catch(Exception $e) {
            die("An error occurred while processing your request. Please try again later.");
        }
    }
} 
else {
    die ("you are not allowed to see this page");
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
<body>
<h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="../logout.php">Logout</a>
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">    
            <a href="add_user_form.php" class="btn btn-success" ><i class="fa fa-create"></i>Create New user</a>
        </div>
        <table id="usetTable" class="table table-striped border">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Mobile Number</th>
                <th>group Name</th>
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
                            <td><?php echo $user['group_name']; ?></td>
                            <td><?php echo $user['type']; ?></td>
                            <td>
                            <a href="edit_user_form.php?id=<?php echo $user['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Edit </a>
                            <a href="#" onclick="confirmDelete(<?php echo $user['id']; ?>)" class="btn btn-danger">Delete</a>
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

<script>
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this user?")) {
    window.location.href = "delete_user.php?id=" + id + "&confirm=true";
  }
}
</script>
</body>