<?php 

class music{
	private $db;
	function __construct($db){
		$this->db=$db;
	}
    public function submitMethod(){
    	$mid=$_POST['mid'];
    	$content=$_POST['content'];
    }

}








 ?>