<a class="btn btn-info" href="/trunk/index.php/filters">Back to Filters</a>
<h1>Set Filter</h1>
<form id="filter" action="/trunk/index.php/home/save_filter" method="post">
<input type="hidden" name="uid" value="<?php  if($filter){echo $filter['uid'];}else{echo $_SESSION['user']['uid'];}?>" />
<input type="hidden" name="fid" value="<?php if($filter){echo $filter['fid'];}?>" />
<div>
<br>
	<fieldset>	
		<div>
			<label>State</label>
			<input type="text" name="state" value="<?php  if($filter) echo $filter['state'];?>" />
		</div>

	</fieldset>
<br>
	<fieldset>
		<div class="well">
			<label class="control-label" for="starttime" style="float: left;   margin-right: 10px;">Start Time</label>
			<div id="datetimepicker1" class="input-append date" style="float: left;    margin-right: 100px;">
				<input data-format="yyyy-MM-dd hh:mm:ss" name="s_from" type="text" id="s_from" value="<?php  if($filter)  echo $filter['s_from'];?>"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
			<label class="control-label" for="endtime" style="float: left;   margin-right: 10px;">End Time</label>
			<div id="datetimepicker2" class="input-append date" style="float:left; margin-right:10px">
				<input data-format="yyyy-MM-dd hh:mm:ss" name="s_to" type="text" id="s_to" value="<?php  if($filter)  echo $filter['s_to'];?>" >
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
	
	
		<div class="control-group" style="float:left; width:25%">
			<label class="control-label" for="inputRepeat" style="float:left;margin-right:10px">Repeat</label>
			<div class="controls" style="float:left;">
				<select id="repeat_flag" name="repeat_flag" onchange="show_week_days()" style="">
					<option <?php if($filter && $filter['repeat_flag']=='1'){echo "selected";}?> value="1" onclick="">Yes</option>
					<option <?php if(!$filter || $filter['repeat_flag']=='0'){echo "selected";}?> value="0" onclick="">No</option>
				</select>    	
			</div>
		</div>
		</div>
			<div id="week_days" class="<?php if(!$filter || $filter['repeat_flag']=='0') {echo 'none';}?> " style="float:left; width:25%">
					<label class="control-label" for="">Days</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="monday" <?php if($filter&&$filter['monday']) echo 'checked="checked"'; ?> >Monday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="tuesday" <?php if($filter&&$filter['tuesday']) echo 'checked="checked"'; ?>>Tuesday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="wednesday" <?php if($filter&&$filter['wednesday']) echo 'checked="checked"'; ?>>Wednesday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="thursday" <?php if($filter&&$filter['thursday']) echo 'checked="checked"'; ?>>Thursday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="friday" <?php if($filter&&$filter['friday']) echo 'checked="checked"'; ?>>Friday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="saturday" <?php if($filter&&$filter['saturday']) echo 'checked="checked"'; ?>>Saturday
					</label>
					<label class="checkbox">	
						<input type="checkbox" value="1" name="sunday" <?php if($filter&&$filter['sunday']) echo 'checked="checked"'; ?>>Sunday
					</label>
				</div>
	</fieldset>
	<filedset>
		<table class="table">
			<tbody>
			<th>#</th>
			<th>Tag</th>
			<th>Delete</th>
			<?php if($tags){foreach($tags as $k=>$tag){?>
				<tr>
					<td class="row_count" style="width:20%"><?php echo $k+1;?></td>
					<td><input class="tag" type="text" name="tags[]" value="<?php echo $tag;?>" ></td>
					<td><div class="btn btn-danger" onclick="deleteTag(this)">Delete</div></td>
				</tr>
			<?php }}?>
				<tr class="none empty_tag">
					<td class="row_count" style="width:20%">1</td>
					<td><input class="tag" type="text"  value="" /></td>
					<td><div class="btn btn-danger" onclick="deleteTag(this)">Delete</div></td>
				</tr>	
			</tbody>
		</table>
	</fieldset>
	<div class="btn btn-success" onclick="addNewTag()">Add New Tag</div>
	<br></br><br>
	<div style="float:none; width:25%">
		<button type="submit" class="btn btn-primary">Save</button>
	</div>
</div>
</form>
<script>
function show_week_days(obj){
	if($('#repeat_flag').val()=='1'){
		$('#week_days').show();
	}else{
		$('#week_days').hide();
	}
}
function addNewTag(){
	var item = $('table').find('.empty_tag').clone().removeClass('none empty_tag');
	item.find('.row_count').text($('.table tr').length-1);
	$('input',item).attr('name','tags[]');
	item.insertBefore('.empty_tag');
}
function deleteTag(obj){
	$(obj).parent().parent().remove();
}
</script>
<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker({
	  	language: 'pt-BR'
		});
		$('#datetimepicker2').datetimepicker({
	  	language: 'pt-BR'
		});
	});
</script>