function getRecipes(offset, length)
{
	
	if(offset === undefined) offset = 0;
	if(length === undefined) length = -1;
	
	$.getJSON('/recipe.php', {offset: offset, length: length}, function (data){
	
		$('.recipeList').empty();
	
		for(recipe in data){
			var recipeRow = buildRecipeRow(data[recipe]);
			$('.recipeList').append(recipeRow);
		};
		
		
		/*$('.recipeList').paging(data.length, { 
					format: '[< ncnnn! >]',
					perpage: 10,
					lapping: 0,
					page: 1,
					onSelect: function (page) { console.log(this); },
					onFormat: function (type) {
						switch(type) {
							case 'block':
								return '<a href="#">' + this.value + '</a>';
							case 'next':
								return '<a href="#">&gt;</a>';
							case 'prev':
								return '<a href="#">&lt;</a>';
							case 'first':
								return '<a href="#">first</a>';
							case 'last':
								return '<a href="#">last</a>';
						}
					}
				});*/
		$(".recipe-list").pagination(122, {
	        items_per_page:20,
	        callback:handlePagingClick
		});
	});
}

jQuery(document).ready(function () {

	//getRecipes(0, 5);
	$.getJSON('/recipePreview.php', {offset: 0, length: 5}, initPagination);
	//initPagination();
});


/**
 * Callback function that displays the content.
 *
 * Gets called every time the user clicks on a pagination link.
 *
 * @param {int}page_index New Page index
 * @param {jQuery} jq the container with the pagination links as a jQuery object
 */
function pageselectCallback(page_index, jq){
    var new_content = $('#hiddenresult div.result:eq('+page_index+')').clone();
    $('#Searchresult').empty().append(new_content);
    return false;
}

/** 
 * Callback function for the AJAX content loader.
 */
function initPagination() {
    var num_entries = $('#hiddenresult div.result').length;
    // Create pagination element
    $("#Pagination").pagination(num_entries, {
        num_edge_entries: 2,
        num_display_entries: 8,
        callback: pageselectCallback,
        items_per_page:2
    });
 }


function buildRecipeRow(recipe)
{

	var row = $('<li class="recipe"></li>');

	row.append($('<div class="icon"></div>').html('<img src="img/icon.jpg" />'));

	row.append($('<div class="info"></div>').html(buildRecipeInfo(recipe)));
	//row.append($('<div class="userInfo"></div>').html(buildUserInfo(recipe));
	
	return row;
}

function buildRecipeInfo(recipe)
{

	var info = $('<ul></ul>');

	info.append($('<li></li>').html('<h1>' + recipe['recipe_title'] + '</h1>'));
	info.append($('<li></li>').html('<h3>Serves ' + recipe['recipe_serves'] + '</h3>'));
	info.append($('<li></li>').html('<h3>Prep/Cook Time: ' + Number(recipe['recipe_prep_time_min'] + recipe['recipe_cook_time_min']) + '</h3>'));
	info.append($('<li></li>').html('<h3>Submitted By: Dave</h3>'));
	info.append($('<li></li>').html('<h3>Date submitted 1/1/2001</h3>'));

	return info;
}

