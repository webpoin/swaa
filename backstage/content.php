<?php


	
	function makeTree($data,$par){

		$res = '';

		foreach ($data as $k => $v) {
			if($v['parent'] == $par){

				//取parent == this id 的数组传入递归
				$id = $v['id'];
				$parent = $v['parent'];
				$title = $v['title'];
				$position = $v['position'];
				$size = $v['size'];
				$show = $v['show'];
				$content = $v['content'];
				$child = makeTree($data,$v['id']);

				$res .= "<h4>
					<i>&nbsp;</i> 
					<b class=\"oid\">$id</b>
					<b class=\"pare\">$parent</b>
					<b class=\"titl\">$title</b>
					<b class=\"posn\">$position</b> 
					<b class=\"size\">$size</b> 
					<b class=\"show\">$show</b> 
					<b class=\"cont\">$content</b>
					<a href=\"/$id\" class=\"look\">查看网页</a> 
					<a href=\"\" class=\"append\">增加子集</a>  
					<a href=\"\" class=\"updata\">编辑</a> 
					<a href=\"\" class=\"delete\">删除</a>
				</h4>
				<div>$child</div>";
			}
		}
		return $res;
	}

	function getpost($key){
		return isset($_GET[$key]) ? $_GET[$key] : ( isset($_POST[$key]) ? $_POST[$key] : null);
	}



	define('DIR', '../');
	//取数据
	require_once(DIR."DB/DataBase.class.php");
	$DataBase = new DataBase();

	$html = '<!DOCTYPE HTML><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title></title><link rel="stylesheet" type="text/css" href="style.css"></head><body>%s</body></html>';


	if( getpost('type') && getpost('id')){

		$type = getpost('type');
		$id = getpost('id');

		echo $id.'--'.$type;

		echo $_SERVER['QUERY_STRING'];


/*
		//返回表单
		
		echo sprintf($html,$res);

*/

	}else{
		//返回树
		$res = '<h2 class="main_title"><span> <strong>id.</strong>名称</span> <b>位置</b> <b>大小</b> <b>类型</b> <b>内容</b> <b>操作</b></h2><div class="main" style="overflow:auto;position:absolute;top:40px;bottom:0px;left:0;width:100%;">';
		$data = $DataBase->selectAll('layout');
		$res .= makeTree($data,0);
		$res .= '</div>';
		$res .= '<div class="form"><form action="" method="get">
					<label>标题</label><input type="text" name="title"/><br/>
					<label>父级</label><input type="text" name="parent"/><br/>
					<label>位置</label><select name="size">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
										  	
										</select><br/>
					<label>大小</label><select name="size">
											<option>1x1</option>
										  	<option>1x2</option>
										  	<option>2x1</option>
										  	<option>2x2</option>
										  	<option>2x4</option>
										  	<option>2x6</option>
										  	<option>4x2</option>
										  	<option>4x4</option>
										  	<option>4x6</option>
										  	<option>8x2</option>
										  	<option>8x4</option>
										  	<option>8x6</option>
										</select><br/>
					<label>子集显示类型</label><select  name="show">
											<option value="menu">菜单</option>
											<option value="list">列表</option>
											<option value="project">项目</option>
											<option value="article">文章</option>
										</select><br/>
					<label>内容</label><textarea type="text" name="content" ></textarea><br/>
					<input type="submit" />
					<input type="reset" />
					<input type="button" value="取消"/>
				</form></div>';
		$res .= '<script src="jquery-1.10.2.min.js" ></script>';
		$res .= '<script src="content.js" ></script>';
		echo sprintf($html,$res);
	}



	

/*
	<h4 class="main_title">
		<span> <strong>id.</strong>名称</span> 
		<b>位置</b> 
		<b>大小</b> 
		<b>类型</b> 
		<b>内容</b> 
		<b>操作</b>
	</h4>
	<div class="main" style="overflow:auto;position:absolute;top:40px;bottom:0px;left:0;width:100%;">
*/

	
	


	

	
?>