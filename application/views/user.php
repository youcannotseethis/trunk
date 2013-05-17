<div style='width=75%; float:left;'>
<h1><?php echo $user['uname'];?> 's Homepage</h1>
<p><?php 
if ($user['uid']==$_SESSION['user']['uid']) {
	echo "It's You!";
} elseif(!$relation){?>
	<a class="btn btn-primary" style="float:left;margin-right:30px" href="javascript:void(0)" onclick="follow(<?php echo $_SESSION['user']['uid'];?>, <?php echo $user['uid'];?>,this)">
		Follow
	</a>
	<?php if($relation2){?>	
		<div class="btn btn-info"><?php echo 'Following you'?></div>	
	<?php }else{?>
			<div class="btn btn-info"><?php echo 'Not following you'?></div>
<?php }}else{?>
	<a class="btn btn-danger" style="float:left;margin-right:30px"  href="javascript:void(0)" onclick="unfollow(<?php echo $_SESSION['user']['uid'];?>, <?php echo $user['uid'];?>,this)">
		Unfollow
	</a>
	<?php if($relation2){?>	
		<div class="btn btn-info"><?php echo 'Following you'?></div>	
	<?php }else{?>
			<div class="btn btn-info"><?php echo 'Not following you'?></div>
<?php }}
?></p>
<p><b>Gender:</b> <?php
    if ($user['gender']==1){
    	echo "Male";
    } else if ($user['gender']==0){
    	echo "Female";
    } else {
    	echo "Secret";
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

<script>
	function follow(c_uid, f_uid,obj){
		wc_action(c_uid,f_uid,'follow');
	}
	function unfollow(c_uid, f_uid, obj){
		wc_action(c_uid, f_uid, 'unfollow');
	}

	function wc_action(c_uid,f_uid,action){
	    var obj = $(obj);
	    $.post( '<?php echo BASE_URI;?>index.php/home/follow', {c_uid:c_uid,f_uid:f_uid,action:action},function(data){
	        if(data=='reload'){				
                window.location.reload();
            }else{
				
	            alert(data);}
	        });
	};
</script>