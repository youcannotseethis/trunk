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
              echo $userinfo['last_latitude']; 
              ?>,
              <?php 
              echo $userinfo['last_longitude']; 
              ?>], 13);

          // add an OpenStreetMap tile layer
          L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);
		  
		  
		  var popup = L.popup();

		  		function onMapClick(e) {
		  			popup
		  				.setLatLng(e.latlng)
		  				.setContent("You clicked the map at " + e.latlng.toString())
		  				.openOn(map);
						$('input[name="latitude"]').val(e.latlng.lat.toString());
						$('input[name="longitude"]').val(e.latlng.lng.toString());
		  		}

		  		map.on('click', onMapClick);
		  

          // add a marker in the given location, attach some popup content to it and open the popup
          L.marker([
              <?php 
              echo $userinfo['last_latitude']; 
              ?>,
              <?php 
              echo $userinfo['last_longitude']; 
              ?>]).addTo(map)
              .bindPopup('<p style="text-align:center;">your last position is here! <br/>(<?php echo $userinfo['last_latitude'];?>,<?php echo $userinfo['last_longitude'];?>)</p>')
              .openPopup();
      })
    </script>
</head>
<body>
    <div id="map" style="width: 550px; height: 550px; position: absolute;"></div>
    <div id="content" style="margin-left: 610px">
      <h1>set the fake location</h1>
      <br/>
       
       <div id='insert_form'>
		   <?php #dump(BASE_URI); ?>
           <form action="<?php echo BASE_URI.'index.php/home/update_last_loc'; ?>" method="post" onsubmit="validateForm(this);return false;">
             <fieldset>
               <br/>
			   <input type="hidden" name = "uid" value = "<?php echo $_SESSION['user']['uid']; ?>">
               <b>Latitude:  </b><input type="text" id ="latitude" name="latitude" placeholder="<?php 
              echo $userinfo['last_latitude']; 
              ?>"><br/>
               <b>Longitude :  </b><input type="text" id="longitude" name="longitude" placeholder="<?php 
              echo $userinfo['last_longitude']; 
              ?>">
               <span class="help-block">  </span>
			   
               <button type="submit" class="btn btn-primary">Submit</button>
			   <button type="reset" class="btn btn-inverse" id="cancelBtn">Reset</button>   
             </fieldset>
			     
           </form>
		   
       </div>
      <br/>
  </div>
    <script>
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
    </script>
</body>
</html>  
  