<?php
class MySQLHandler implements DBHandler{
    private $_table;
    private $_db_handler;

    public function __construct($table){
        $this->_table = $table;
        $this->connect();
    }

    public function connect(){
        try
        {
            $handler = mysqli_connect(_Host_, _User_, _Pass_, _DB_);
            if(!$handler)
            {
                return false;
            }
            $this->_db_handler = $handler;
            // die('Done network');
            return true;
        }
        catch(Exception $e)
        {
            die('Something went wrong, Please comeback later');
        }
    }

    public function getRecords($fields = array(),  $start = 0){
        $table = $this->_table;
        if(empty($fields)){
            $sql = "select * from `$table`";
        }else{
            $sql = "select ";
            foreach($fields as $field){
                $sql .= " `$field`, ";
            }
            $sql .= " from `$table` ";
            $sql = str_replace(", from", "from", $sql);
        }
        return $this->getResults($sql);
    }

    public function get_record_by_id($id, $primary_key="id"){
        $table = $this->_table;
        $sql = "select * from `$table` where `$primary_key` = $id";
        return $this->getResults($sql);
    }

    public function insert($table,$params=array()){
    	$sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
        if(mysqli_query($this->_db_handler,$sql)){
            return true;
        }
        
    }

    public function update($table,$params=array(),$where){
    		$args=array();
			foreach($params as $field=>$value){
				$args[]=$field.'="'.$value.'"';
			}
			$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
            if(mysqli_query($this->_db_handler,$sql)){
                return true;
            }
    }

    public function getResults($sql){
        if(_Debug_Mode_ === 1){
            echo '<h4> Sent Query: </h4>' .$sql. "<br>";
        }
        $_result_handler = mysqli_query($this->_db_handler, $sql);//point to results
        $_results = [];

        if(!$_result_handler){
            return false;
        }
        //loop and fetch the record that fetched by handler
        while($record = mysqli_fetch_array($_result_handler, MYSQLI_ASSOC)){
            $_results[] = array_change_key_case($record);//store each row for ecach index
        }
        return $_results;
    }

    public function check_empty($data, $fields) {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        } 
        return $msg;
    }

}