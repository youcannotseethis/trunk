<h2>Place List</h2>
<table class="table">
	<tbody>
		<th>ID</th>
		<th>Name</th>
		<th>Latitude</th>
		<th>Longitude</th>
<?php	foreach($places as $place){?>
			<tr>
				<td><a href="/trunk/index.php/place?pid=<?php echo $place['pid']?>" ><?php echo $place['pid'];?></a></td>
				<td><?php echo $place['pname'];?></td>
				<td><?php echo $place['latitude'];?></td>
				<td><?php echo $place['longitude'];?></td>
			</tr>
<?php }?>
	</tbody>
</table>