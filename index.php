<?php


	define('DIR', './');


	require_once(DIR."DB/DataBase.class.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = 1;
	}


	$DataBase = new DataBase();
	$self = $DataBase->getSelfById($id);
	$child = $DataBase->getChildById($id);

	

	$title = 'fuck';
	$content = '';

	foreach ($child as $key => $value) {
		$position[$value['position']] = $value;
	}

	for ($i=1; $i < count($position) +1; $i++) { 
		$val = $position[$i];
		$size = 'block_'.substr($val['size'],0,1).'x'.substr($val['size'],1,2);

		$content .= "<cite><a href=\"\" class=\"$size\">".$val['content']."</a></cite>";
	}


	//die(var_dump($child));



	$tpl = file_get_contents(DIR.'tmp/'.$self['show'].'.htm');
	$tpl = str_replace('<!--{title}-->', $title, $tpl);
	$tpl = str_replace('<!--{content}-->', $content, $tpl);


	echo $tpl;



	//var_dump($child);






?>