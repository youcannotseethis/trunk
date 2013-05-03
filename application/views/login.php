<?php echo validation_errors(); ?>
<form action="/trunk/index.php/pub/attempt_login" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
		<div class="title">Log In</div>
		 <input type="hidden" value="<?=$this->input->get('referral')?('/'.$this->input->get('referral')):''?>" name="referral"/>
		<div >
			<div class="float_left">
				<label for="name">Username</label>
				<input type="text" value="" name="name"/>
			</div>
		</div>
		<div >
			<div class="form_input float_left">
				<label for="password">Password</label>
				<input type="password" value="" name="password"/>
			</div>
		</div>
		<div >
			<input type="submit" value="Login" class="button float_right"/>
		</div>
	</fieldset>
</form>

