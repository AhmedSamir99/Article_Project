<?php


class MySqlHandler implements DbHandler{
    private $_db_handler;
    private $_table;
    
    public function __construct($table){
        $this->_table= $table;
        $this-> connect();        
    }

    public function connect(){
    try{
        
    $handler= mysqli_connect(HOST, USER, PASS, DB);
    if ($handler) {
        $this->_db_handler= $handler;
        return true;
    } else {
        echo "Could not connect to MySQL<br/>";
        return false;
    }
}
    catch(Exception $e) {
        die("something went wrong, please try again");
        }
    }

    public function disconnect() {
        if ($this->_db_handler)
            mysqli_close($this->_db_handler);
    }

    public function getData($fields = array(), $start = 0) {
        $table = $this->_table;

        if (empty($fields)) {
            $sql = "select * from `$table`";
        } else {
            $sql = "select ";
            foreach ($fields as $f) {
                $sql .= " $f, ";
            }
            $sql .= "from  $table ";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= "limit $start," . RECORDS_PER_PAGE;
        return $this->getResults($sql);
    }



    public function getRecordById($id,$primary_key="id"){
        die($id);
        $table=$this->_table;
        $sql= "select * from `$table` where `$primary_key` =$id";
        return $this->getResults($sql);
    }


private function getResults($sql){
    if(Debug__Mode === 1){
      echo "send query:" .$sql ."<br/>";
    }
    $_handler_results= mysqli_query($this->_db_handler, $sql);
    $_arr_results= array();
    if($_handler_results){
        while ($row =mysqli_fetch_array($_handler_results, MYSQLI_ASSOC)){
            $_arr_results []= array_change_key_case($row);
        }
        return $_arr_results;
    }
    else{
        return false;
    }
}

}
?>