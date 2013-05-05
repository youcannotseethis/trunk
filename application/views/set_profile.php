<div>
	<a href="/trunk/index.php/setting/set_filter">Set Filters</a>
</div>
<form  action="/trunk/index.php/setting/save_profile" method="post">
	<fieldset>
	<input type="hidden" name="uid" value="<?php echo $user['uid'];?>" />
		<?php #dump($user);?>
		<h1 >Edit Profile</h1>
		
		
		<div >
			<div >
				<label for="name">first name</label>
				<input type="text" value="<?php echo $user['first_name'];?>" name="first_name"/>
			</div>
		</div>
		
		<div >
			<div>
				<label for="password">Last Name</label>
				<input type="text" value="<?=$user['last_name']?>" name="last_name"/>
			</div>
		</div>
		
		<div >
			<label>Gender</label>
			<select name="gender" >
			  <option <?php echo $user['gender']=='1'?'selected="selected"':'' ;?> value="1">Male</option>
			  <option <?php echo $user['gender']=='0'?'selected="selected"':'' ;?> value="0">Female</option>
			  <option <?php echo $user['gender']=='2'?'selected="selected"':'' ;?> value="2">Secret</option>
			</select>
		</div>
		
		<div>
			<label for="description">description</label>
			<textarea  name="description"><?php echo $user['description'];?></textarea>
		</div>		
		
		<div class="">
			<input type="submit" value="save" class="button float_right" />
		</div>
		
		<div id="save_hint"></div>
		
	</fieldset>
</form>

