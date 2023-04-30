<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MySqlHandler implements DbHandler{
    private $_db_handler;
    private $_table;
    private $_log;

    private $path="../../";
    public function __construct($table){
        $this->_table= $table;
        $this->_log = new Logger('exceptions');
        $this->_log->pushHandler(new StreamHandler($this->path.'exceptions.log', Logger::DEBUG));
        $this->connect();
    }

    public function connect(){
        try
        {
            $handler = mysqli_connect(HOST, USER, PASS, DB);
            if(!$handler)
            {
                return false;
            }
            $this->_db_handler = $handler;
            return true;
        }
        catch(Exception $e)
        {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die('Something went wrong, Please comeback later');
        }
    }

    public function disconnect() {
        try {
            if ($this->_db_handler) {
                mysqli_close($this->_db_handler);
                $this->_db_handler = null;
            }
            return true;
        } catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");
        }
    }

    public function getData($fields = array(),  $start = 0){
        $table = $this->_table;
        if(empty($fields)){
            $sql = "select * from `$table`";
        }else{
            $sql = "select ";
            foreach($fields as $f){
                $sql .= " `$f`, ";
            }
            $sql .= " from `$table` ";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= "limit $start," . RECORDS_PER_PAGE;

        try {
            return $this->getResults($sql);
        } catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");
        }
    }

    public function getRecordById($id, $primary_key="id"){
        $table = $this->_table;
        $sql = "select * from `$table` where `$primary_key` = $id";
        try {
            return $this->getResults($sql);
        } catch(Exception $e) {

            die("An error occurred while processing your request. Please try again later.");        }
    }

    public function insert($params){
        $table = $this->_table;
    	$sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
        return $this->executeQuery($sql);   
    }

    public function executeQuery($sql) {
        try {
            $_handler_results = mysqli_query($this->_db_handler, $sql);

            if ($_handler_results) {
                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");        }
    }

    public function updateRecord($id, $data) {
        try {
            $table = $this->_table;
            $updateFields = '';
            foreach ($data as $key => $value) {
                $updateFields .= "`$key`='$value',";
            }
            $updateFields = rtrim($updateFields, ','); // remove the last comma
            $sql = "update `$table` set $updateFields where `id` = $id";
            return $this->executeQuery($sql);
        }
        catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");
            }
        }

    public function delete($id) {
        $this->connect();
        $table = $this->_table;
        $data = $this->getRecordById($id)[0];
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $this->updateRecord($id, $data);
       
    }
    public function deleteRecordById($id, $primary_key = "id") {
        $table = $this->_table;
        $sql = "delete from `$table` where `$primary_key` = $id";

        try {
            return $this->executeQuery($sql);
        } catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");        }
   
    }

    public function getResults($sql){
        if(Debug__Mode === 1){
            echo '<h4> Sent Query: </h4>' .$sql. "<br>";
        }try {
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
        } catch(Exception $e) {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die("An error occurred while processing your request. Please try again later.");        }
    }

    public function restore($id) {
        $this->connect();
        $table = $this->_table;
        $data = $this->getRecordById($id)[0];
        $data['deleted_at'] = null;
        echo $data['deleted_at'];
        $this->updateRecord($id, $data);
       
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