<div style='width=75%; float:left;'>
<h1><?php echo $user['first_name']." ".$user['last_name'];?> 's Homepage</h1>
<p><?php 
if ($user['uid']==$_SESSION['user']['uid']) {
	echo "It's You!";
} else {
	echo "follow or unfollow, TODO";
}
?></p>
<p><b>Gender:</b> <?php
    if ($user['gender']==1){
    	echo "gentle";
    } else if ($user['gender']==0){
    	echo "lady";
    } else {
    	echo "secret";
    }
?></p>
<p><b>Description:</b> <?php echo $user['description']; ?> </p>
<h1><?php echo $user['first_name']." ".$user['last_name'];?> Recent Notes</h1>
<table class="table table-hover">
	<?php 
	# to do get notes number;
	#$note_num = 25;
	$index = 1;
	#for ($index = 1; $index <= $note_num; $index++) {
		foreach($note as $row){
    ?>
	<tr class="info">
	    <td><a href="note?nid=<?php echo $row['nid'];?>"><?php echo $index;$index+=1; ?></a></td>
	    <td><?php echo $row['text_body']." #".$row['keyword']; ?></td> <!-- TODO add link to this note -->
	    <td>at <a href="place?pid=<?php echo $row['pid']; ?>"><?php echo $row['pname']; ?></a></td> <!-- TODO add link to this place -->
		<td>when <?php echo $row['note_dt_inserted']; ?></td> <!-- TODO add link to this place -->
	  </tr>
	<?php
    }
	?>
    
</table>
</div>
<div style='width=25%; float:right;'>
	<h1 style="text-align:right;">Following</h1>
	
	<div style="text-align:right;">
	<?php	
	foreach($following as $row){
		echo "<a href=user?uid=".$row['FOLLOWED_USER'].">";
		echo $row['first_name']." ".$row['last_name'];
		echo "</a><br>";
	}
	?>
	</div>
	
	<h1 style="text-align:right;">Followed by</h1>
	
	<div style="text-align:right;">
		<?php	
		foreach($followed as $row){
			echo "<a href=user?uid=".$row['CURRENT_U'].">";
			echo $row['first_name']." ".$row['last_name'];
			echo "</a><br>";
			
		}
		?>
	
	</div>
	
</div>