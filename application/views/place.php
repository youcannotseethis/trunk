<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <?php 
    echo "<link href=".BASE_URI."assets/css/leaflet.css rel='stylesheet' media='screen'>"; 
    echo "<script src=".BASE_URI."assets/js/leaflet.js></script>" ;
    ?>
    <script type="text/javascript">L.Icon.Default.imagePath = '../../assets/img';</script>
    <script type="text/javascript">
      $(function() {
          var map = L.map('map').setView([
              <?php 
              echo $place['latitude']; 
              ?>,
              <?php 
              echo $place['longitude']; 
              ?>], 13);

          // add an OpenStreetMap tile layer
          L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          // add a marker in the given location, attach some popup content to it and open the popup
          L.marker([
              <?php 
              echo $place['latitude']; 
              ?>,
              <?php 
              echo $place['longitude']; 
              ?>]).addTo(map)
              .bindPopup('<?php echo $place['pname']?>')
              .openPopup();
      })
    </script>
</head>
<body>
    <div id="map" style="width: 550px; height: 550px; position: absolute;"></div>
    <div id="content" style="margin-left: 610px">
      <h1><?php echo $place['pname']?></h1>
      <br/>
       <button class="btn btn-large btn-primary" type="button" id="addNoteBtn">Add your note!</button>
       <div id='insert_form' style='display:none;'>
		   <?php #dump(BASE_URI); ?>
           <form action="<?php echo BASE_URI.'index.php/home/add_note'; ?>" method="post" onsubmit="validateForm(this);return false;">
             <fieldset>
               <br/>
			   <input type="hidden" name = "pid" value = "<?php echo $_GET['pid']; ?>">
			   <input type="hidden" name = "uid" value = "<?php echo $_SESSION['user']['uid']; ?>">
               <b>Note:  </b><input type="text" name="text_body" placeholder="About this place…"><br/>
               <b>Tag :  </b><input type="text" name="keyword" placeholder="food, coffee, or some keyword…">
               <label>About Filter</label>
			   <div class="well">
   			<label class="control-label" for="starttime">Start Time</label>
   			<div id="datetimepicker1" class="input-append date" >
   				<input data-format="yyyy-MM-dd hh:mm:ss" name="s_from" type="text" id="s_from" >
   				<span class="add-on">
   					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
   				</span>
   			</div>
   			<label class="control-label" for="endtime" >End Time</label>
   			<div id="datetimepicker2" class="input-append date" >
   				<input data-format="yyyy-MM-dd hh:mm:ss" name="s_to" type="text" id="s_to" >
   				<span class="add-on">
   					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
   				</span>
   			</div>
		</div>
			   <?php # todo datepick and timepick ?>
               <label class="checkbox">
                     <input type="checkbox" value="1" id="repeatFlag" name="repeat_flag"> Repeat?
                </label>
                <label class="checkbox" id="repeatWeekDay" style="display:none;">
                     <input type="checkbox" value="1"  name="sunday"> Every Sunday?<br/> 
                     <input type="checkbox" value="1"  name="monday"> Every Monday?<br/> 
                     <input type="checkbox" value="1"  name="tuesday"> Every Tuesday?<br/> 
                     <input type="checkbox" value="1"  name="wednesday"> Every Wendesday?<br/> 
                     <input type="checkbox" value="1"  name="thursday"> Every Thursday?<br/> 
                     <input type="checkbox" value="1"  name="friday"> Every Friday?<br/> 
                     <input type="checkbox" value="1"  name="saturday"> Every Saturday?<br/> 
                 </label>
               <span class="help-block">Example block-level help text here.</span>
               <button type="submit" class="btn">Submit</button>
			   <button type="reset" class="btn btn-inverse" id="cancelBtn">Cancel</button>   
             </fieldset>
			     
           </form>
		   
       </div>
      <br/>
      <?php if (count($note)>0) {?>
      <h1>Recent User's Note</h1>
      <table class="table table-hover">
          <?php 
          $index = 1;
        foreach($note as $row){
			if (!in_array($row['nid'],$muteNid)){
          ?>
          <tr class="info">
              <td><a href="note?nid=<?php echo $row['nid'];?>"><?php echo $index;$index+=1; ?></a></td>
              <td><?php echo $row['text_body']." #".$row['keyword']; ?></td> 
              <td>by <a href="user?uid=<?php echo $row['uid']?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></a></td> 
              <td>when <?php echo $row['note_dt_inserted']; ?></td> 
			  <td>liked by <?php echo $row['time']; ?> time</td> 
			  <?php if (!in_array($row['nid'],$likeNid)) { ?>
			  <td><button class="btn btn-primary" type="button" onclick="likeNote(<?php echo $_SESSION['user']['uid'];?>,<?php echo $row['nid'];?>,this);">Like!</button></td> 
			  <?php } else { ?>
			  <td><button class="btn btn-info" type="button">Liked</button></td> 
			  <?php } ?>
			  <td><button class="btn btn-warning" type="button" onclick="muteNote(<?php echo $_SESSION['user']['uid'];?>,<?php echo $row['nid'];?>,this);">Mute</button></td> 
            </tr>
          <?php
          }}
          ?>
      </table>
      <?php
      } else { echo "<h1>No User's Note Yet</h1>"; }
      ?>
    </div>
    <script>
    $("#addNoteBtn").click(function() {
        $("#insert_form").show("fast");
    });
    $("#repeatFlag").click(function(){ 
        if ($("#repeatFlag").prop('checked')) {
            $("#repeatWeekDay").children().removeAttr("disabled");  
            $("#repeatWeekDay").show("fast");
        } else {
            $("#repeatWeekDay").children().attr("checked",false);
            $("#repeatWeekDay").children().attr("disabled", true);
            $("#repeatWeekDay").hide("fast");
       }
    });
	$("#cancelBtn").click(function(){
		$("#insert_form").hide("fast");
	});
    $(function() {
      $('#datetimepicker1').datetimepicker({
        language: 'pt-BR'
      });
    });
    $(function() {
      $('#datetimepicker2').datetimepicker({
        language: 'pt-BR'
      });
    });
	function likeNote(uid,nid,obj){
        wc_act(uid,nid,obj,'like','note');
	};
	function muteNote(uid,nid,obj){
	    if(confirm('Are you sure?')){
	        wc_act(uid,nid,obj,'mute','note');
	    }
	};
	function wc_act(uid,nid,obj,action,type){
	    var obj = $(obj);

        var functionName ;
		if (action=='mute'){
		    functionName = '<?php echo BASE_URI;?>index.php/home/muteNote';
	    } else if (action=='like'){
	 	    functionName = '<?php echo BASE_URI;?>index.php/home/likeNote';
	    } else if (action=='unlike') {
	    	functionName = '<?php echo BASE_URI;?>index.php/home/unlikeNote';
	    }
	    $.post(functionName, {uid:uid,nid:nid,action:action},function(data){
	       // obj.parent().parent().hide();  //用jquery移除被delete的那行
			
	        if(data=='reload'){
				
                window.location.reload();
            }else{
				
	            alert(data);}
	        });
	};
    </script>
</body>
</html>  
  