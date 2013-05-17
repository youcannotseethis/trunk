<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <?php #dump($note);
    echo "<link href=".BASE_URI."assets/css/leaflet.css rel='stylesheet' media='screen'>"; 
    echo "<script src=".BASE_URI."assets/js/leaflet.js></script>" ;
    ?>
    <script type="text/javascript">L.Icon.Default.imagePath = '../../assets/img';</script>
    <script type="text/javascript">
      $(function() {
          var map = L.map('map').setView([
              <?php 
              echo $userinfo['last_latitude']; 
              ?>,
              <?php 
              echo $userinfo['last_longitude']; 
              ?>], 13);

          // add an OpenStreetMap tile layer
          L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          // add a marker in the given location, attach some popup content to it and open the popup
          L.marker([
              <?php 
              echo $userinfo['last_latitude']; 
              ?>,
              <?php 
              echo $userinfo['last_longitude']; 
              ?>]).addTo(map)
              .bindPopup('user is here!')
              .openPopup();
      })
    </script>
</head>
<body>
    <div id="map" style="width: 550px; height: 550px; position: absolute;"></div>
    <div id="content" style="margin-left: 610px">
      <h1>Nearby Notes</h1>
      <br/>
      <?php if (count($note)>0) {?>
      
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
			  <td>at <a href="place?pid=<?php echo $row['pid']?>"><?php echo $row['pname']; ?></a></td> 
              <td>when <?php echo $row['note_dt_inserted']; ?></td> 
			  
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
  