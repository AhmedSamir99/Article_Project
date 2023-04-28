<!-- Interface -->
<?php
//all functions needed to be implemented in class
interface DBHandler {
    public function connect();
    public function getRecords($fields = array(),  $start = 0);//get records per page with start record
    // public function disconnect();   
    // public function get_record_by_id($id,$primary_key="id");//get specific record with id and pk
    
    
}