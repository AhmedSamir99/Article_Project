<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require_once 'vendor/autoload.php'; 
$db = new MySqlHandler('');

//check first if the user is logged in
if(isset($_SESSION["logged"]) ==true) {
    if ($_SESSION['type'] == 'admin') {
    //if the user was admin , then get all the users
       
            //join groups table to i can get the group name instead of group id
            $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";
            $users = $db->getResults($sql);
       

    } elseif($_SESSION['type'] == 'editor') {
  //if the user was editor , then get the users with type editor
        
            $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id WHERE u.type ='editor'";
            $users = $db->getResults($sql);
        
    }
} 
else {
    die ("you are not allowed to see this page");
}

?>
    
    <div class="container mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user "></i>Users</h1>
      </div>
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

   
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>
  </body>
</html>