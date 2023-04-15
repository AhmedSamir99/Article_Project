<?php
$current_index = isset($_GET["next"]) && is_numeric($_GET["next"])? (int) $_GET["next"] : 0 ;

$items = $db->getData(array () , $current_index);

?>
<div >
<?php foreach ($items as $item){?>
    <div style="display:flex; flex-direction:row ; justify-content:center;align-items:center">
    <h3>    <?php echo "ID: " . $item["id"] ." "; ?> </h3>
    <h3>    <?php echo "Title: " . $item["name"] ." " ;  ?> </h3>
    <h3>    <?php echo "Content: " . $item["type"] ." " ; ?> </h3>
    <button ><a href="views/single.php">view</a></button>
    <button>edit</button>
    <button>delete</button>
    </div>
<?php } ?>
</div>