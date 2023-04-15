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
        $sql .= "limit $start," ._Recorde_per_page_;
        return $this->getResults($sql);
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

}