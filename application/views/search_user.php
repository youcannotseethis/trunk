<table id="search_user" class="table table-hover">
	<tbody>
<?php	if($users){?>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>First Name</th>
		<th>Last Name</th>

<?php		foreach($users as $user){
?>				<tr>
					<td><a href="/trunk/index.php/user?uid=<?php echo $user['uid'];?>" ><?php echo $user['uid'];?></a></td>
					<td><?php echo $user['uname'];?></td>
					<td><?php echo $user['email'];?></td>
					<td><?php echo $user['first_name'];?></td>
					<td><?php echo $user['last_name'];?></td>
				</tr>	
<?php		}
		}else{?>
				<tr><div style="color: #ff0000"><?php echo "No resultes";?></div></tr>
<?php	}?>
	</tbody>
</table>