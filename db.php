<?php  
	
	Class Database{
		private $host='';
		private $jmeno='';
		private $heslo='';
		private $datab='';
		public $db;
		public function __construct(){
			$this->host="localhost";
			$this->jmeno="root";
			$this->heslo="";
			$this->datab="kminek";
			$this->db=new mysqli($this->host,$this->jmeno,$this->heslo,$this->datab);
		}

		public function Select($sql){
			$result = $this->db->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function Execute($sql){
			$result = $this->db->query($sql);
			if($result){
				return true;
			}else{
				return false;
			}
		}

	}





?>