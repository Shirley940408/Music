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
	$musicName=array();
	$singerName=array();
	$num=array();
	$total=array();
	$key=array();
	foreach ($banner_url as $val){
		$key[]=$val['id'];
		$picture[]=$val['banner_url'];
		$musicName[]=$val['name'];
		$singerName[]=$val['singer_name'];
		$num[]=$val['score_num'];
		$total[]=$val['total_score'];
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
			'musicName'=>$musicName,
			'singer'=>$singerName,
			'number'=>$num,
			'total'=>$total,
			'cate'=>$musicToCate,
			'banner'=>$picture,
			'key'=>$key,
			'cates'=>$cate
		)
	);

}


 ?>