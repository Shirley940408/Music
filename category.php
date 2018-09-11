<?php 

class category{
	private $db;
	private $twig;
	function __construct($db,$twig)
	{
		$this->db=$db;
		$this->twig=$twig;

	}
	public function getMethod($cid){
		
		$cate_to_music=$this->db->getCategoriesByID($cid);
		$category=$this->db->fetchCates($cid);
		// print_r($category);
		$musics=array();
		// $cates=array();
		$cates=$this->db->getAllCategories();
    	foreach($category as $value){
    		$mid=$value['m_id'];
    		// echo $mid;
    		$music=$this->db->getMusicByID($mid);
    		// print_r($music);

    		$cate=$this->db->fetchMusicCates($mid);
    		// print_r($cate);
    		$categories=array();
    		foreach($cate as $result){
    			$cateAsMusic=$this->db->getCategoriesByID($result['c_id']);
    			$categories[]=$cateAsMusic['name'];    			
    		}
    		// print_r($categories);
    		$Music_to_Cate[$mid]=$categories;   		
    		$musics[]=$music;
    	}
    	// print_r($Music_to_Cate);
    	echo $this->twig->render('category.html',
	    	array(
	    		'name' => 'AsiaMusic',
	    		'music' => $musics,
	    		'cate' => $Music_to_Cate,
	    		'cates'=> $cates
	    	)
	    );
    }
}

<<<<<<< HEAD
?>
=======
 ?>
>>>>>>> 8a183e3f6209412f8b22ebc0defc56416b1d90bf
