<div style="color: #ff0000;"><?php echo validation_errors();?></div>
<form action="/trunk/index.php/signup" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
		<h1>Create Account</h1>
		<div class=" ">
			<div class="float_left">
				<label for="name">Username</label>
				<input type="text" value="" name="uname"/>
			</div>
		</div>
		<div class="">
			<div class="float_left">
				<label for="password">Password</label>
				<input type="password" value="" name="password"/>
			</div>
		</div>
		<div class="">
			<div class="float_left">
				<label for="password1">Password Confirm</label>
				<input type="password" value="" name="password1"/>
			</div>
		</div>
		<div class="">
			<div class="float_left">
				<label for="email">Email</label>
				<input type="email" value="" name="email"/>
			</div>
		</div>
		<div>
			<label>Gender</label>
			<select name="gender" >
			  <option selected="selected" value="1">Male</option>
			  <option selected="selected" value="0">Female</option>
			  <option selected="selected" value="2">Secret</option>
			</select>
		</div>
		<div class="">
			<div class="float_left">
				<label for="">First Name</label>
				<input type="text" value="" name="first_name"/>
			</div>
		</div>
		<div class="">
			<div class="float_left">
				<label for="">Last Name</label>
				<input type="text" value="" name="last_name"/>
			</div>
		</div>
		<div class="">
			<div class="float_left">
				<label for="description">Description</label>
				<input type="text" value="" name="description"/>
			</div>
		</div>
		
		<div class="row ">
			<input type="submit" value="Create" class="button float_right"/>
		</div>
	</fieldset>
</form>
