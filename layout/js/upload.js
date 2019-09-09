$(function(){
	$('body').on('submit','#upload-form',function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var frm = $(this);
		var courseId = $('#course-to-upload').val();
		var contentId = $('#content-to-upload').val();
		var data = new FormData();
		if(frm.find('#up-file').length === 1 ){
			data.append('file', frm.find( '#up-file' )[0].files[0]);
		}
		data.append('courseId', courseId);
		data.append('contentId', contentId);
		var ajax  = new XMLHttpRequest();
		ajax.upload.addEventListener('progress',function(evt){
			var percentage = (evt.loaded/evt.total)*100;
			upadte_progressbar(Math.round(percentage));
		},false);
		ajax.addEventListener('load',function(evt){
			if(evt.target.responseText.toLowerCase().indexOf('error')>=0){
				show_error(evt.target.responseText);
			}else{
				show_error(evt.target.responseText);
			}
			upadte_progressbar(0);
			frm[0].reset();
			
		},false);
		ajax.addEventListener('error',function(evt){
			show_error('حدث خطأ ...!');
			upadte_progressbar(0);
		},false);
		ajax.addEventListener('abort',function(evt){
			show_error('تم الغاء العملية ...');
			upadte_progressbar(0);
		},false);
		ajax.open('POST',url);
		ajax.send(data);
		return false;
	}); 
});

function upadte_progressbar(value){
	$('#upload-prog').css('width',value+'%').html(value+'%');
	if(value==0){
		$('#prog').hide();
	}else{
		$('#prog').show();
	}
}
function show_error(error){
	$('#prog').hide();
	$('#upload-status').show();
	$('#upload-status').html(error);
}