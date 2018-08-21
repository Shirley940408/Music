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
    public function getMusicByName($name){
        $stmt=$this->getInstance()->prepare('SELECT * FROM musics WHERE name LIKE :name');
        $stmt->execute(
            array(
                ':name'=>$name.'%'
            )
        );
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;        
    }
        public function getMusicBySinger($name){
        $stmt=$this->getInstance()->prepare('SELECT * FROM musics WHERE singer_name LIKE :name');
        $stmt->execute(
            array(
                ':name'=>$name.'%'
            )
        );
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
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

        public function insertComment($mid, $content, $uid){
         $stmt=$this->getInstance()->prepare('INSERT INTO comments(m_id,date, content,u_id) VALUES(:mid,:date,:content,:uid)');
             // var_dump(date('Y-m-d h:i:s'));
                $result=$stmt->execute(
                    array(
                        ':mid'=>$mid,
                        ':date'=>date('Y-m-d h:i:s'),
                        ':content'=>$content,
                        ':uid'=>$uid
                    )
                );
                return $result;           
        }

        public function insertScore($mid, $score){
         $stmt=$this->getInstance()->prepare('INSERT INTO score(m_id,date, score) VALUES(:mid,:date,:score)');
             // var_dump(date('Y-m-d h:i:s'));
                $result=$stmt->execute(
                    array(
                        ':mid'=>$mid,
                        ':date'=>date('Y-m-d h:i:s'),
                        ':score'=>$score

                    )
                );
                return $result;           
        }
        public function updateMusic($mid, $score){
        $stmt=$this->getInstance()->prepare('UPDATE musics SET total_score = total_score + :score, score_num = score_num + 1 WHERE id= :id');
        $result=$stmt->execute(
            array(
                ':id'=>$mid,
                ':score'=>$score
            )
        );
        return $result;
        }

        public function loginCheck($email,$pwd){
             $stmt=$this->getInstance()->prepare("SELECT * FROM users WHERE email= :email AND password=:pwd");
             $stmt->execute(
                array(
                    ':email'=>$email,
                    ':pwd'=>$pwd
                )
             );
             return $stmt->fetch(PDO::FETCH_ASSOC);//equal with fetch(2);
        }

        public function getUsers(){
        $stmt= $this->getInstance()->query('SELECT * FROM users');
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
$db=new DB();

// print_r($db->loginCheck("1@gmail.com",1));

// print_r($db->updateMusic(1, 4));


?>