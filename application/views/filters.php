<a class="btn btn-info" href="/trunk/index.php/filter" >Create Filter</a>
<br>
<div id="filters" class="table">
<?php #dump($fiters);
#dump($user);
?>

<table class="table table_hover">
	<tbody>
<?php if($filters){?>
		<caption><h1>Filters of <?php echo $user['uname'];?></h1></caption>
		<th>FID</th>
		<th>State</th>
		<th>Tags</th>
		<th>Current State</th>
<?php  foreach($filters as $filter){?>
			<tr >
				<td><a href="/trunk/index.php/filter?fid=<?php echo $filter['fid'];?>" > <?php echo $filter['fid'];?></a></td>
				<td><?php echo $filter['state'];?></td>
				<td><?php echo $filter['tags'];?></td>
				<td><?php if($filter['fid']==$user['current_state']){?>
							<a class="btn btn-danger"  href="javascript:void(0)" onclick="setcurrentstate(<?php echo $filter['fid'];?>,<?php echo $user['uid'];?>)" >Yes</a>
					<?php }else{?>
							<a class="btn btn-primary" href="javascript:void(0)" onclick="setcurrentstate(<?php echo $filter['fid'];?>,<?php echo $user['uid'];?>)" >No</a>
					<?php }?>
				</td>
			</tr>
<?php	}}else{
			echo "<tr>No Filters Yet! </tr>";
		}
?>
	</tbody>
</table>
</div>

<script>
function setcurrentstate(fid,uid){
	 $.post( '<?php echo BASE_URI;?>index.php/home/currentstate', {uid:uid,fid:fid},function(data){
	        if(data=='reload'){				
                window.location.reload();
            }else{
	            alert(data);}
	        });
}
</script>