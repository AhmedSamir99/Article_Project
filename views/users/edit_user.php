<?php
require_once '../../vendor/autoload.php'; 
$db = new MySqlHandler('users');
$id = (isset ($_GET["id"]))? intval ($_GET["id"]) : 0;
$user = $db->getRecordById($id)[0];

// Fetch the list of groups
$dbHandler = new MySqlHandler('groups'); 
$groups = $dbHandler->getData();

// Get the group ID and name for the user being edited
$userGroupId = $user['group_id'];
$userGroupName = '';
foreach ($groups as $group) {
    if ($group['id'] == $userGroupId) {
        $userGroupName = $group['name'];
        break;
    }
}
?>
