<?php 
class DB{
	private $pdo;
	private function getInstance(){
		if (!$this->pdo){
			$servername='localhost';
			$dbname='music';
			$username='root'; 
			$password='root';
		    $this->pdo=new PDO("mysql:host=$servername;dbname=$dbname",	$username,$password);
		}
		return $this->pdo;
	}
	public function getAllMusic(){
		$stmt= $this->getInstance()->query('SELECT * FROM musics');
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
    }
    public function getMusicByID($id){
    	$stmt=$this->getInstance()->prepare('SELECT * FROM musics WHERE id = :id');
    	$stmt->execute(
    		array(
    			':id'=>$id
    		)
    	);
    	$result=$stmt->fetch(PDO::FETCH_ASSOC);
    	return $result;
    }

}

$db=new DB();
print_r($db->getMusicByID(1));





?>