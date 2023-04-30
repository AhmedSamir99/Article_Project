<!-- Interface -->
<?php
//all functions needed to be implemented in class
interface DbHandler {
    public function connect();
    public function getData($fields = array(),  $start = 0);//get records per page with start record
    public function disconnect();   
    public function getRecordById($id,$primary_key="id");//get specific record with id and pk
    
    
}