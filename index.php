<?php 
require_once './DB.php';
require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());
$db=new DB();
// Routing system
if(array_key_exists('url',$_GET)){
	$url=$_GET['url'];
	$array=explode('/',$url);
	if(!file_exists($array[0].'.php')){
		echo "Sorry, wrong route";
		exit();
	}
	// var_dump($array);
	require_once($array[0].'.php');
	$controller=new $array[0]($db,$twig);
	if (array_key_exists(1,$array)){
		$method = $array[1].'Method';	
	}else{
		$method = 'indexMethod';
	}

	if(array_key_exists(2,$array)){
		$controller->$method($array[2]);
	}else{
		$controller->$method();
	}
}else{
	$music=$db->getAllMusic();
	$cate=$db->getAllCategories();
	$banner_url=$db->getMusicOrder();
	$picture=array();
	foreach ($banner_url as $val){
		$picture[]=$val['banner_url'];
	}
	// print_r($picture);
	$musicToCate=array();
	foreach($music as $value){
		$cateAll=array();
		foreach($db->fetchMusicCates($value['id']) as $result){
			array_push($cateAll,$db->getCategoriesByID($result['c_id'])['name']);		
		}
		$musicToCate[$value['id']]=$cateAll;
	}
	// print_r($musicToCate);

	$name='AsiaMusic';
	echo $twig->render(
		'index.html', 
		array(
			'name' =>$name,
			'music'=>$music,
			'cate'=>$musicToCate,
			'banner'=>$picture,
			'cates'=>$cate
		)
	);

}


 ?>