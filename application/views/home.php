<div style='width=75%; float:left;'>
<h1>Friends' Recent Notes</h1>
<table class="table table-hover">
	<?php 
	# to do get notes number;
	#$note_num = 25;
	$index = 1;
	#for ($index = 1; $index <= $note_num; $index++) {
		foreach($note as $row){
    ?>
	<tr class="info">
	    <td><a href="home/note?nid=<?php echo $row['nid'];?>"><?php echo $index;$index+=1; ?></a></td>
	    <td><?php echo $row['text_body']." #".$row['keyword']; ?></td> <!-- TODO add link to this note -->
	    <td>by <a href="home/user?uid=<?php echo $row['note_uid']?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></a></td> 
	    <td>at <a href="home/place?pid=<?php echo $row['note_pid']?>"><?php echo $row['pname']; ?></a></td> 
		<td>when <?php echo $row['note_inserted']; ?></td> 
	  </tr>
	<?php
    }
	?>
    
</table>
</div>
<div style='width=25%; float:right;'>
	<h1><?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];?></h1>
	
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