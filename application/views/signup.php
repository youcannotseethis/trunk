<form action="/trunk/index.php/pub/signup" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
		<div class="title">Create Account</div>
		<div class=" has_floats">
			<div class="float_left">
				<label for="name">Username</label>
				<input type="text" value="" name="name"/>
			</div>
		</div>
		<div class="has_floats">
			<div class="float_left">
				<label for="password">Password</label>
				<input type="password" value="" name="password"/>
			</div>
		</div>

		<div class="has_floats">
			<div class="float_left">
				<label for="email">Email</label>
				<input type="email" value="" name="email"/>
			</div>
		</div>
		<div class="has_floats">
			<div class="float_left">
				<label for="gender">Gender</label>
				<input type="text" value="" name="gender"/>
			</div>
		</div>
		<div class="has_floats">
			<div class="float_left">
				<label for="discription">Discription</label>
				<input type="text" value="" name="discription"/>
			</div>
		</div>
		
		<div class="row has_floats">
			<input type="submit" value="Create" class="button float_right"/>
		</div>
	</fieldset>
</form>
