<table id="search_note" class="table table-hover">

	<tbody>
	<h1>Search Results for <span style="color:#ff0000"><?php echo $q;?></span><h1>
<?php	if($notes){ ?>
			<th>ID</th>
			<th>User</th>
			<th>Keyword</th>
			<th>Repeat</th>
			<th>Start Time</th>
			<th>Endtime</th>
<?php		foreach($notes as $note){
?>				<tr>
					<td><a href="/trunk/index.php/note?nid=<?php echo $note['nid'];?>" ><?php echo $note['nid'];?></a></td>
					<td><a href="/trunk/index.php/user?uid=<?php echo $note['uid'];?>"><?php echo $note['nid'];?></a></td>
					<td><?php echo $note['keyword'];?></td>
					<td><?php echo $note['repeat_flag'];?></td>
					<td><?php echo $note['s_from'];?></td>
					<td><?php echo $note['s_to'];?></td>
				</tr>
<?php }}else{
?>			<tr><div style="color:#ff0000">No results</div></tr>
<?php }?>
	</tbody>
</table>
