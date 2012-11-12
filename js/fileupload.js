
function start()
{
	$('#fileUpload .upload_text').html('Uploading...');
	
	$('#fileUpload .file_input').hide();
	
	$('#fileUpload .progess').show();

}

function done(data)
{
	$('#fileUpload .progress').hide();
	$('#fileUpload .uploaded_file span').html('success');
	$('#fileUpload .uploaded_file').show();
	$('#fileUpload #recipe_main_photo').val(encodeURIComponent(data.result[0].name));
	
	$('#fileUpload .preview').html('<img class="previewImage" src="'+data.result[0].url+'">');
}

function progressUpdate(data)
{
	var progress = parseInt(data.loaded / data.total, 10);
	
	var position = progress * Number($('#fileUpload .progress').css('width'));
	
	$('#fileUpload .progress_icon').css('left', position);
}