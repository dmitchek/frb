

var COLS = 28;
var ROWS = 7;
var display_state;
var queue="";
var timer;
var cur_col = 0;

function shift()
{
	var newValue = '';
	if(cur_col < queue.length)
	{
		set_col(0, queue[cur_col]);
		cur_col++;
	}
	else
	{
		cur_col = 0;
		queue = getNextChar();
	}

	for(var i = COLS; i > 0 ; i--)
	{
		for(var j=ROWS; j > 0; j--)
		{
			var elem = $('#led-'+(j-1)+'-'+(i-2));
			
			set_led(j-1, i-1, elem.hasClass('on'));
		}
	}
	update_display();

}

function update_display()
{
	for(i = 0; i < COLS; i++)
	{
		for(var j = 0; j < ROWS; j++)
		{
			var elem = $('#led-'+j+'-'+i);
			set_led(j, i, elem.hasClass('on'));
		}
	}
}

function set_col(col, colValue)
{
	for(var i = 0; i < ROWS; i++)
	{
		set_led((ROWS-1-i), col, colValue[i]);
	}
}

function set_led(row, col, value)
{
	var elem = $('#led-'+row+'-'+col);

	if(value)
		elem.removeClass('off').addClass('on');
	else
		elem.removeClass('on').addClass('off');
}

function getNextChar()
{
	var newChar = '';
	if(toDisplay.length > 0)
	{
		var curChar = toDisplay.substr(0,1);
		toDisplay = toDisplay.substr(1);
		if(symbols[curChar] !== undefined)
		{
			newChar = symbols[curChar];
		}
	}
	return newChar;
}


$(document).ready(function(){

	// Default interval
	$('.interval').val(300);

	$('.led').click(function(){
		if($(this).hasClass('on'))
			$(this).removeClass('on').addClass('off');
		else
			$(this).removeClass('off').addClass('on');
	});	

	$('.clear').click(function(){
		if(timer)
		{
			clearInterval(timer);
			timer = undefined;
		}
		
		$('.on').removeClass('on');

	});

	$('.start').click(function(){
		
		var val = Number($('.interval').val());
		toDisplay = $('.message').val();
		queue = getNextChar();
		if(val != NaN)
			if(!timer)
				timer = setInterval(shift, val);
			else
				alert('Timer already running!');
		else
			alert('Interval much be a number! Jeez!');
	});

	$('.stop').click(function(){
		if(timer)
		{
			clearInterval(timer);
			timer = undefined;
		}
	});

});
