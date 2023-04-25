<?php
    // Load the user record from the database
    require_once '../../vendor/autoload.php'; 
    $db = new MySqlHandler('users');
    // $user = $db->getRecordById($_POST['id']);
    $id = (isset ($_POST["id"]))? intval ($_POST["id"]) : 0;
    $user = $db->getRecordById($id)[0];

    // Update the record with the new values
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'mobile_number' => $_POST['mobile_number'],
        'group_id' => $_POST['group_id'],
        'type' => $_POST['type'],
    );
    $db->updateRecord($user['id'], $data);

    // Redirect back to the user list
    header('Location:all.php');
?>
