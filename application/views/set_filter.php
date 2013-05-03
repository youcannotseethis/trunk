<?php dump($user); dump($filters); ?>
<div>Hey you</div>

<div>
	<a href="/trunk/index.php/setting/set_profile">Edit Profile</a>
</div>
<form  action="/trunk/index.php/setting/save_filter" method="post" onsubmit="validateForm(this);return false;">
	<fieldset>
	<input type="hidden" name="uid" value="<?php echo $_SESSION['user']['uid'];?>" />
		<?php #dump($user);?>
		<h1 >Edit Filters</h1>
		
		<div class="">
			<input type="submit" value="save" class="button float_right" />
		</div>
	</fieldset>
</form>

