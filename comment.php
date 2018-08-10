<?php 
// require_once'./DB.php';
class comment{
	private $db;
	function __construct($db){
		$this->db=$db;
	}
    public function submitMethod(){
    	$result=$this->db->insertComment($_POST['mid'], $_POST['content']);
    	echo $result;
    	header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json;charset=UTF-8");
    	if($result){
    		$message=array(
    			'code' =>200,
    		    'message' =>'Add comment successfully'
    		); 		
    	}else{
    		$message=array(
    			'code'=>400,
    			'message'=>'Add failed'
    		);	
    	}
    	echo json_encode($message); 
    }

}

// $aaa=new comment($db);
// $aaa->submitMethod();






 ?>