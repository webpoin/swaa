<?php


	echo $_SERVER["QUERY_STRING"];

	if(isset($_GET['tpl'])){
		echo file_get_contents($_GET['tpl']);
	}

	





?>