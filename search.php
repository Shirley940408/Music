<?php 

class search{
	private $db;
	private $twig;
	function __construct($db,$twig){
		$this->db=$db;
		$this->twig=$twig;
	}
	public function indexMethod(){
		$cates=$this->db->getAllCategories();
		if($_POST['name']){
		$result1=$this->db->getMusicByName($_POST['name']);
		$result2=$this->db->getMusicBySinger($_POST['name']);
		if($result1){
			$result=$result1;
		}else if($result2){
			$result=$result2;
		}else{
			echo "No result.";
			exit();
		}
		$Music_to_Cate=Array();
		foreach($result as $value){
		$name=$value['name'];
		$cateArray=$this->db->fetchMusicCates($value['id']);
		$Array=array();
		   foreach($cateArray as $res){
		   	$cate_to_music=$this->db->getCategoriesByID($res['c_id']);
		   	$Array[]=$cate_to_music['name'];
		   	// var_dump($Array);
		   }
		$Music_to_Cate[$name]=$Array;
		}
		// $cate_to_music=$this->db->getCategoriesByID($cid);
		// $category=$this->db->fetchCates($cid);
		// // print_r($category);
		// $musics=array();
		// // $cates=array();
		// $cates=$this->db->getAllCategories();
  //   	foreach($category as $value){
  //   		$mid=$value['m_id'];
  //   		// echo $mid;
  //   		$music=$this->db->getMusicByID($mid);
  //   		// print_r($music);

  //   		$cate=$this->db->fetchMusicCates($mid);
  //   		// print_r($cate);
  //   		$categories=array();
  //   		foreach($cate as $result){
  //   			$cateAsMusic=$this->db->getCategoriesByID($result['c_id']);
  //   			$categories[]=$cateAsMusic['name'];    			
  //   		}
  //   		// print_r($categories);
  //   		$Music_to_Cate[$mid]=$categories;   		
  //   		$musics[]=$music;
  //}
	    	echo $this->twig->render('search.html',
		    	array(
		    		'name' => 'AsiaMusic',
		    		'music' => $result,
		    		'cate'=> $Music_to_Cate,
		    		'cates'=> $cates
		    	)
		    );
		}
	}
}





 ?>