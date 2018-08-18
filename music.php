<?php 
class music{
	private $db;
	function __construct($db,$twig){
		$this->db=$db;
		$this->twig=$twig;
	}
	public function getMethod($id){
		$music=$this->db->getMusicByID($id);
		$cate_to_music=$this->db->fetchMusicCates($id);
<<<<<<< HEAD
		$username=$this->db->getUsers();
=======
>>>>>>> 2ad2f5048419d5d97f549ae835ecf26d7066bf33
		$str='';
    	foreach($cate_to_music as $value){
    		$cid=$value['c_id']; 		
    		$cate=$this->db->getCategoriesByID($cid)['name'];
    		// var_dump($cate);
    		$str.=$cate." ";
    		// var_dump($str);
    		$comment=$this->db->getCommentByID($id);
    	}
    	$cates=$this->db->getAllCategories();
	    echo $this->twig->render(
	    	'single.html', 
	    	array('music' => $music,
	    		'cate'=>$str,
	    		'comment'=>$comment,
	    		'name'=>"AsiaMusic",
<<<<<<< HEAD
	    		'cates'=>$cates,
	    		'username'=>$username
=======
	    		'cates'=>$cates
>>>>>>> 2ad2f5048419d5d97f549ae835ecf26d7066bf33
			)
	    );
	}

}




// $twig = new Twig_Environment($loader, array());




 ?>