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
    public function getMusicOrder(){
    	$stmt=$this->getInstance()->prepare('SELECT * FROM musics ORDER BY (total_score/score_num) DESC LIMIT 3');
    	$stmt->execute();
    	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    	return $result;    	
    }
    	public function getAllCategories(){
		$stmt= $this->getInstance()->query('SELECT * FROM categories');
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
    }
        public function getCategoriesByID($id){
    	$stmt=$this->getInstance()->prepare('SELECT * FROM categories WHERE id = :id');
    	$stmt->execute(
    		array(
    			':id'=>$id
    		)
    	);
    	$result=$stmt->fetch(PDO::FETCH_ASSOC);
    	return $result;   	
    }        
        public function fetchMusicCates($id){
    	$stmt=$this->getInstance()->prepare('SELECT * FROM music_to_categories WHERE m_id = :id');
    	$stmt->execute(
    		array(
    			':id'=>$id
    		)
    	);

    	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    	return $result;
    }

        public function fetchCates($id){
        $stmt=$this->getInstance()->prepare('SELECT * FROM music_to_categories WHERE c_id = :id');
        $stmt->execute(
            array(
                ':id'=>$id
            )
        );

        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
        public function getCommentByID($id){
        $stmt=$this->getInstance()->prepare('SELECT * FROM comments WHERE m_id = :id');
    	$stmt->execute(
    		array(
    			':id'=>$id
    		)
    	);
    	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    	return $result;
        }
        public function insertComment($mid, $content){
         $stmt=$this->getInstance()->prepare('INSERT INTO comments(m_id,date, content) VALUES(:mid,:date,:content)');
             var_dump(date('Y-m-d h:i:s'));
                $result=$stmt->execute(
                    array(
                        ':mid'=>$mid,
                        ':date'=>date('Y-m-d h:i:s'),
                        ':content'=>$content

                    )
                );
                return $result;           
        }

}

$db=new DB();
// print_r($db->insertComment(1,'lalala'));





?>