<form id="filter" action="/trunk/index.php/home/save_filter">
	<div>
		<label style="float:left">State</label>
		<input type="text" name="state" value="<?php echo $filter['state'];?>" />
	</div>
<?php foreach($tags as $k=>$tag){?>
	<div>
		<label style="float:left">Tag<?php echo "#$k: ";?></label>
		<input type="text" name="tags[]" value="<?php echo $tag;?>" />
	</div>
<?php }?>	

	<div>
		<label style="float:left">State</label>
		<input type="text" name="tags[]" value="<?php echo $filter['state'];?>" />
	</div>
	<div>
		<label style="float:left">State</label>
		<input type="text" name="tags" value="<?php echo $filter['state'];?>" />
	</div>
	<div>
		<label style="float:left">State</label>
		<input type="text" name="tags" value="<?php echo $filter['state'];?>" />
	</div>
	<div>
		<label style="float:left">State</label>
		<input type="text" name="tags" value="<?php echo $filter['state'];?>" />
	</div>	
</div>
