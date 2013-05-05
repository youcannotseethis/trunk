<div id="fiters" class="table">
<?php #dump($fiters);
?>

<table class="table table_hove">
	<tbody>
<?php if($filters){?>
		<caption><h1>Filters of <?php echo $user['uname'];?></h1></caption>
		<th>FID</th>
		<th>State</th>
		<th>Tags</th>
		<th>Repeate</th>
<?php  foreach($filters as $fiter){?>
			<tr class="info">
				<td><?php echo $fiter['fid'];?></td>
				<td><?php echo $fiter['state'];?></td>
				<td><?php echo $fiter['tags'];?><td>
			</tr>
<?php	}}else{
			echo "NO SUCH FILTER";
		}
?>
	</tbody>
</table>
</div>