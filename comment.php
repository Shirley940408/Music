<?php 
// require_once'./DB.php';
<<<<<<< HEAD
session_start();
=======
>>>>>>> 2ad2f5048419d5d97f549ae835ecf26d7066bf33
class comment{
	private $db;
	function __construct($db){
		$this->db=$db;
	}
    public function submitMethod(){
<<<<<<< HEAD
        if(!$_SESSION){
            $message=array(
                    'code'=>800,
                    'username'=>'Add failed',
                    'comment'=> 'Please login before using comments'
                );
        }else{
        $result=$this->db->insertComment($_POST['mid'], $_POST['content'], $_SESSION['id']);
        // echo $result;
        $res=$this->db->insertScore($_POST['mid'], $_POST['score']);
        $ress=$this->db->updateMusic($_POST['mid'], $_POST['score']);

            if($result){
                $message=array(
                    'code' =>200,
                    'message' =>'Add comment successfully',
                    'comment'=> $_POST['content'],
                    'username'=> $_SESSION['email']
                );      
            }else{
                $message=array(
                    'code'=>400,
                    'message'=>'Add failed',
                    'comment'=> 'Please try again.'
                );  
            }            
        }

    	echo json_encode($message); 
        header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json;charset=UTF-8");
=======
    	$result=$this->db->insertComment($_POST['mid'], $_POST['content']);
    	// echo $result;
        $res=$this->db->insertScore($_POST['mid'], $_POST['score']);
        $ress=$this->db->updateMusic($_POST['mid'], $_POST['score']);
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
>>>>>>> 2ad2f5048419d5d97f549ae835ecf26d7066bf33
    }
}

// $aaa=new comment($db);
// $aaa->submitMethod();






 ?>