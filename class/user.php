<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
?>

<?php
    class user{
        private $db;
        public function __construct()
		{
			$this->db = new Database();

		}

        public function insert_user($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			
			$class = mysqli_real_escape_string($this->db->link, $date['uclass']);
			$password = mysqli_real_escape_string($this->db->link, $date['password']);

			if($name == ""  || $class=="" || $password == ""){
				$alert = "<span class='text-warning'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_user WHERE user_name=$name LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='text-warning'>The User Already Exists??? </span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_user('user_name',user_pass,user_class_id) VALUES('$name','$password','$class') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='text-success'>Insert User Successfully</span>";
						return $alert;
					}else {
						$alert = "<span class='text-warning'>Insert User NOT Success</span>";
						return $alert;
					}
				}
			}
		}

        public function login($name,$password)
		{
			if($name == '' || $password == ''){
				$alert = "<span class='text-warning'>name And Password must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_user WHERE user_name='$name' AND user_pass='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('userlogin', true);
					Session::set('user_id', $value['user_id']);
					Session::set('user_name', $value['user_name']);
					header('Location:index.php');
				}else {
					$alert = "<span class='text-warning'>name or Password doesn't match</span>";
					return $alert;
				}
			}
		}
    }

?>