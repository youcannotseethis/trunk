<div style='width:100%;'>
<h1>Note</h1>
 <table class="table table-hover">
    <tr class="info" style='width:500px;'>
      <td style='width:500px; float:left;'>note info</td> <!-- TODO add link to this note -->
    </tr>
    <tr class="info" style='width:500px;'>
      <td style='width:283px; float:left;'>by user</td> <!-- TODO add link to this note -->
	  <td style='width:200px; float:left;'>at place</td> 
    </tr>
</table>
<br>
<table class="table table-hover">
	<?php 
	# to do get notes number;
	$note_num = 25;
	#$index = 1;
	for ($index = 1; $index <= $note_num; $index++) {
    ?>
	<tr class="success"  style='width:600px; float:left;'>
	    <td style='width:10px; float:left;'><?php echo $index; ?></td>
	    <td style='width:500px; float:left;'>comment</td> <!-- TODO set comment content -->
	  </tr>
	<?php
    }
	?>
    
</table>
</div>
