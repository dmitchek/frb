
function updateList(elem)
{
	var input = $(elem).parent('div').prev('input');
	var list = $(elem).parent('div').next();
	var listId = $(list).attr('id');
	var listCount = $(list).children().size();
	var itemId = listId + '-item' + (listCount);
	var inputVal = $(input).val();
	
	if(($(elem).hasClass('add')) && (inputVal.length > 0))
	{
		var html = '<li id="' + itemId + '">';
	    	html += '<span>' + inputVal  + '</span><div style="display: inline-block;"><div onclick="editItem(\'' + itemId + '\')" class="listItemEdit">Edit</div>';
	    	html += '<div onclick="removeItem(\'' + itemId + '\')" class="listItemRemove">X</div></div></li>'
	
	    	list.append(html);
	    	
	    	$(input).val('');
	}
	else if($(elem).hasClass('save'))
	{
		if(inputVal.length > 0)
		{
			$('.selected span').html($(input).val());
			$('.selected').removeClass('selected');
			$(elem).removeClass('save').addClass('add').html('add');
		}
		else
		{
			$('.selected').remove();
		}
	}
	
	updateArrayList(list);
}

function removeItem(elem)
{	
	var list = $('#'+elem).parent();
	$('#' + elem).remove();
	updateArrayList(list);
}

function updateArrayList(list)
{
	var array = '{ "items": [';
	
	var input = '';
	
	if($(list).attr('id').indexOf('instructions') >= 0)
		input = $('#recipe_instructions');
	else if($(list).attr('id').indexOf('ingredients') >= 0)
		input = $('#recipe_ingredients');
		
	$(list).children('li').each(function(){

		array += ('"' + $(this).children('span').html() + '"');

		if(!$(this).is($(list).children('li').last()))
			array += ',';
		
	});

	array += ']}';
	
	$(input).val(array);
}

function submit()
{
	var postData = new Object();

	$('[id^="recipe"], #submitted_by').each(function(){
		postData[$(this).attr('id')] = convertToType($(this).val(), $(this).attr('data-type'));
	});
		
	$.post('recipe.php', postData);

}

function convertToType(value, type)
{
	var convertedVal = '';
	
	switch(type)
	{
	case 'number':
		convertedVal = Number(value);
		break;
		
	case 'string':
	case 'array':
	default:
		convertedVal = value;
		break;
		
	}
	
	return convertedVal;
}

function editItem(elem)
{
	var listElem = $('#' + elem.split('-')[0]);	
	var listName = listElem.attr('data-list');
	var input = $('.inputCol #' + listName + '_input');
	var updateButton = listElem.prev('div').children('button');
	
	$(input).val($('#'+elem+' span').html());
	
	$('.selected').removeClass('selected');
	$('#'+elem).addClass('selected');
	
	$(updateButton).removeClass('add').addClass('save').html('save');

}

var select = function ()
{
	var input = $(this).parent().prev('div').prev('div').children('input');
	$('.selected').removeClass('selected');
	$(this).addClass('selected');
	$(input).val($(this).html());
}

function initSubmittedDropdown()
{
	$.getJSON('users.php/all', function(data){
		
		var newOption;
		
		$(data).each(function(){
			newOption = '<option value="' + this.user_id + '">' + this.user_name + '</option>';
			$('#submitted_by').append(newOption);
		});
	});

}


