<?php

	/**
	* 
	*/
	class DataBase{

		private $conn;
		private $dbname="suwei";
		private $host= "localhost";
		private $username="root";
		private $password="";
		//private $password="%TGB^YHN";


		public function  __construct(){
			$this->conn = mysql_connect($this->host,$this->username,$this->password);

			if(!$this->conn){
				die("连接失败".mysql_error());
			}
			mysql_select_db($this->dbname,$this->conn);
		}

		function __destruct(){
			//关闭数据库
			@mysql_close($this->conn);
		}


		private function where($arr){

			$res = array();
			foreach ($arr as $key => $value) {
				if(is_int($value)){$res[] = "`$key`=$value";}
				if(is_string($value)){$res[] = "`$key`='$value'";}
			}
			return join(" AND ",$res);
		}


		//$this->select('qq_infor',array('qq_num'=>1357113262));
		public function select($form,$where){

			$sql = "SELECT * FROM  `$this->dbname`.`$form` WHERE ".$this->where($where);

			$dosql = mysql_query($sql,$this->conn);

			if($dosql){
				$res = mysql_fetch_array($dosql);
			}
			return !empty($res) ? $res: false;
		}



		//$this->updata('qq_infor',array('qq_id'=>$id),array('qq_gettime'=>$time));
		public function updata($form,$where,$data){

			$val = array();
			foreach ($data as $k => $v) {
				if(is_int($v)){$val[] = "`$k`=$v";}
				if(is_string($v)){$val[] = "`$k`='$v'";}
			}
			$set_data =  join(",",$val);

			$sql = "UPDATE `$this->dbname`.`$form` SET $set_data WHERE ".$this->where($where);
			$res = mysql_query($sql,$this->conn);
			return $res;

		}


		//$this->insert('qq_infor',array('qq_num'=>123456,'qq_gettime'=>$time));
		public function insert($form,$data){


			$key = array();
			$val = array();

			foreach ($data as $k => $v) {
				$key[] = '`'.$k.'`';
				if(is_int($v)){
					$val[] = "$v";
				}elseif(is_string($v)){
					$val[] = "'$v'";
				}else{
					$val[] = 'NULL';
				}
			}

			$sql = "INSERT INTO `$this->dbname`.`$form` (".join(",",$key).") VALUES (".join(",",$val).")";
			
			$res = mysql_query($sql,$this->conn);
			return $res;

		}


		//$this->delete('qq_infor',array('qq_id' =>2));
		public function delete($form,$where){
			$sql="delete from `$this->dbname`.`$form` where ".$this->where($where);
			$res=mysql_query($sql,$this->conn);
			return $res;

		}





		public function selectAll($form){
			$sql = "SELECT * FROM  `$this->dbname`.`$form` ";
			$data = mysql_query($sql);

			while ($val = mysql_fetch_assoc($data)) {
				$res[] = $val;
			}
			return $res;
		}

		public function getSelfById($id){
			//$this->select();
			$sql = "SELECT * FROM  `layout` WHERE  `id` =$id";

			$res = mysql_fetch_assoc(mysql_query($sql));
			return $res;

		}


		public function getChildById($id){

			$sql = "SELECT * FROM  `layout` WHERE  `parent` =$id";
			$result = mysql_query($sql);

			for ($i=0; $i <mysql_num_rows($result) ; $i++) { 
				$res[] = mysql_fetch_array($result);
			}
		



			//$res = mysql_fetch_array(mysql_query($sql));
			return $res;


		}

		



	}




?>