<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php');  
require_once '../../vendor/autoload.php'; 
$db = new MySqlHandler('users');
if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $db->restore($id);
}
$users = $db->getData(array());
$sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";
            $users = $db->getResults($sql);
       
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
                        <?php if ($user['deleted_at'] != NULL) {?>
                        <tr>
                        <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['mobile_number']; ?></td>
                                <td><?php echo $user['group_name']; ?></td>
                                <td><?php echo $user['type']; ?></td>
                                <td>
                                <a href="restore.php?id=<?=$user["id"]?>" class="btn btn-success" ><i class="fa fa-undo "></i></a>
                                </td>
                        </tr>
                        <?php } ?>
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