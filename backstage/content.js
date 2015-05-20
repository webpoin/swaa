$(function(){

	var form = 	$('.form');

	form.find('input:button').bind('click',function(){
		form.hide();
		return false;
	})

	$('.append').bind('click',function(){

		var h4 = $(this).closest('h4');
		var id = h4.find('.oid').html(); 

		//赋值
		form.find('input[name="parent"]').val(id).attr('disabled','disabled');
		form.find('form').attr('action','?type=append&id='+id);
		
		form.show();
		return false;
	});

	$('.updata').bind('click',function(){
		var h4 		= $(this).closest('h4');
		var id 		= h4.find('.oid').html();
		var parent 	= h4.find('.pare').html();
		var title 	= h4.find('.titl').html();
		var position= h4.find('.posn').html();
		var size 	= h4.find('.size').html();
		var show 	= h4.find('.show').html();
		var content = h4.find('.cont').html();


		console.log(content);

		//赋值
		form.find('input[name="parent"]').val(parent).attr('disabled','disabled');
		form.find('input[name="title"]').val(title);
		form.find('select[name="position"]').val(position);
		form.find('select[name="size"]').val(size);
		form.find('select[name="show"]').val(show);
		form.find('textarea[name="content"]').val(content);
		//form.find('input[name="content"]').val(content);

		form.find('form').attr('action','?type=append&id='+id);
		form.show();

		form.bind('submit',function(){
			console.log('-->'+form.serialize()+'<--');
			return false;
		})
		return false;
	});

	$('.delete').bind('click',function(){

			alert('delete');
		return false;
	});


})

