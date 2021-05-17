<?php include 'config.php';?>
<?php 

class Database {
    private $host=DB_HOST;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $db_name=DB_NAME;
    
    public $connect;
    public $error;

    function __construct(){
        $this->database_connect();
        session_start();
    }
    public function database_connect(){
        //database holboj bga heseg 
        $this->connect=new Mysqli($this->host, $this->user,$this->pass,$this->db_name);

          if($this->connect){
           
        }

    }
    //database ees data-g hevleh function
    public function data_print($query){
         $data=$this->connect->query($query); //query -es garsn ur dung data method-d hadgalj bga
         if($data->num_rows>0){   //mor n 0-ees ih baih uyd data bga gdgig shalgaj bn 
             return $data;
         }else{
             return false;
         }
    }


    public function data_insert($table_name, $ugugdul){
        $sql="";
        $sql.="INSERT INTO ".$table_name."(";
        $sql.=implode("," , array_keys($ugugdul)).") VALUES (";
        $sql.="'".implode("','", array_values($ugugdul))."')";

       
        if(mysqli_query($this->connect,$sql)){
            return true;
        }else{
            echo mysqli_error($this->connect); 
        }
        
    }


    public function dataDelete( $tableName, $fieldName, $value){
    // Delete from  table where column = value
    $sql="";
    $sql.=" DELETE FROM ".$tableName. " where ".$fieldName." = ".$value;

    if(mysqli_query($this->connect,$sql)){
        return true;
    }else{
        echo mysqli_error($this->connect); 
    }

}
    public function createSession($value) {
            return $_SESSION['uname'] = $value;
    }
}
?>

