$.ajaxSetup ({cache: false });//关闭AJAX相应的缓存

document.getElementById('toback').onclick = function(){
	history.go(-1);	
}


