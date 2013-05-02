<div style='width=75%; float:left;'>
<h1>Notes</h1>
<table class="table table-hover">
	<?php 
	# to do get notes number;
	$note_num = 25;
	#$index = 1;
	for ($index = 1; $index <= $note_num; $index++) {
    ?>
	<tr class="info">
	    <td><?php echo $index; ?></td>
	    <td>note info</td> <!-- TODO add link to this note -->
	    <td>by user</td> <!-- TODO add link to this user -->
	    <td>at place</td> <!-- TODO add link to this place -->
	  </tr>
	<?php
    }
	?>
    
</table>
</div>
<div style='width=25%; float:right;'>
	<h1>self info</h1>
	
	<div>
	<?php	
	date_default_timezone_set('America/New_York');
	$currentHour =  date("G");
    if 	($currentHour>=21 or $currentHour<6) {
    	echo 'Good Night!';
    } else if ($currentHour>=6 and $currentHour<12) {
    	echo 'Good Morning!';
    } else if ($currentHour>=12 and $currentHour<17) {
    	echo 'Good Afternoon!';
    } else if ($currentHour>=17 and $currentHour<21) {
    	echo 'Good evening!';
    }
	#echo USRR_NAME
	?>
	</div>
	
</div>