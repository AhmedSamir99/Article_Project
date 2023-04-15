<?php
interface DbHandler {
    public function connect();
    public function getData($fields = array(),  $start = 0);
    public function disconnect();   
    public function getRecordById($id,$primary_key="id");    
}