<form action="/pub/attempt_login" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
		<div class="title">Log In</div>
		<? #<input type="hidden" value="<?=$this->input->get('referral')?('/'.$this->input->get('referral')):''?>" name="referral"/>?>
		<div class="row has_floats">
			<div class="form_input float_left">
				<label for="name">Username</label>
				<input type="text" value="" name="name"/>
			</div>
		</div>
		<div class="row has_floats">
			<div class="form_input float_left">
				<label for="password">Password</label>
				<input type="password" value="" name="password"/>
			</div>
		</div》
		
		<div class="row has_floats">
			<input type="submit" value="Login" class="button float_right"/>
		</div>
	</fieldset>
</form>
