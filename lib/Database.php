<?php 
    define("DB_HOST", 'localhost');
    define("DB_USER", 'root');
    define("DB_PASS", '');
    define("DB_NAME", 'duongvanhung_DB');
?>

<?php 
    Class Database extends PDO{
        public $host   = DB_HOST;
        public $user   = DB_USER;
        public $pass   = DB_PASS;
        public $dbname = DB_NAME;
      
      
        public $link;
        public $error;

        private function connectDB(){
            $this->link = new mysqli($this->host, $this->user, $this->pass, 
             $this->dbname);
            if(!$this->link){
              $this->error ="Connection fail".$this->link->connect_error;
             return false;
            }
        }

        public function __construct(){
            $this->connectDB();
        }

        public function select($query){
            $result = $this->link->query($query) or 
             die($this->link->error.__LINE__);
            if($result->num_rows > 0){
              return $result;
            } else {
              return false;
            }
        }

        public function insert($query){
            $insert_row = $this->link->query($query);
            if($insert_row){
              return $insert_row;
            } else {
              return false;
             }
        }

        public function update($query){
            $update_row = $this->link->query($query);
            if($update_row){
             return $update_row;
            } else {
             return false;
             }
        }
    }

?>