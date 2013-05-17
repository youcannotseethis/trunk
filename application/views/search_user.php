<table id="search_user" class="table table-hove">
	<tbody>
<?php	if($users){
			foreach($users as $user){
?>				<tr>
					<td><?php echo $user['uid'];?></td>
					<td><?php echo $user['uname'];?></td>
					<td><?php echo $user['email'];?></td>
					<td><?php echo $user['first_name'];?></td>
					<td><?php echo $user['last_name'];?></td>
				<tr>	
<?php		}
		}else{?>
				<tr><?php echo "No resultes";?></tr>
<?php	}?>
	</tbody>
</table>