<form  action="/trunk/index.php/pub/save_profile" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
		
		<div class="title">Edit Profile</div>
		
		
		<div class="row has_floats">
			<div class="float_left">
				<label for="name">first name</label>
				<input type="text" value="<?php echo $user['first_name']?>" name="first_name"/>
			</div>
		</div>
		
		<div class="row has_floats">
			<div class="form_input float_left">
				<label for="password">Last Name</label>
				<input type="text" value="" name="last_name"/>
			</div>
		</div>
		
		<div class="row has_floats">
			<select name="gender" >
			  <option value="1">Male</option>
			  <option value="0">Female</option>
			  <option value="2">Secret</option>
			</select>
		</div>
		
		<div class="row has_floats">
			<div class="form_input float_left">
				<label for="description">description</label>
				<textarea  value="" name="description"></textarea>
			</div>
		</div>
		
		<div class="row has_floats">
			<input type="submit" value="save" class="button float_right"/>
		</div>
		
	</fieldset>
</form>

