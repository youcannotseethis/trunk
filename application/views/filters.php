<div id="filters" class="table">
<?php #dump($fiters);
?>

<table class="table table_hover">
	<tbody>
<?php if($filters){?>
		<caption><h1>Filters of <?php echo $user['uname'];?></h1></caption>
		<th>FID</th>
		<th>State</th>
		<th>Tags</th>
		<th>Repeate</th>
<?php  foreach($filters as $filter){?>
			<tr class="">
				<td><a href="/trunk/index.php/filter?fid=<?php echo $filter['fid'];?>" > <?php echo $filter['fid'];?></a></td>
				<td><?php echo $filter['state'];?></td>
				<td><?php echo $filter['tags'];?><td>
			</tr>
<?php	}}else{
			echo "NO SUCH FILTER";
		}
?>
	</tbody>
</table>
</div>