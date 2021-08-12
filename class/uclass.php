  
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
?>

<?php 
	/**
	* 
	*/
	class uclass
	{
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}

        public function show()
		{
			$query = "SELECT * FROM tbl_class order by class_id desc ";
			$result = $this->db->select($query);
			return $result;
		}
    }
?>