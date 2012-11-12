<html>
<head>
<title>Make some LED fonts!</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
	$size = 7;

	printf('<table cellspacing="25" class="led-table">');
	for($i = $size; $i > 0; $i--)
	{
		printf('<tr>');
		for($j = 28; $j > 0; $j--)
		{
			printf('<td class="led" id="led-%s-%s">&nbsp;</td>', $i-1, $j-1);
		}
		printf('</tr>');
	}
	printf('</table>');
?>

<br/>
<button class="clear">Clear</button>
<button class="stop">Stop</button>
<button class="start">Start</button>
<input class="interval"/> interval (in ms)
<input class="message"/> to display
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="led.js"></script>
<script src="letters.js"></script>

</body>
</html>
