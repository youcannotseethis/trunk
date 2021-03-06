<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<?php 
	echo "<link href=".BASE_URI."assets/css/leaflet.css rel='stylesheet' media='screen'>"; 
	?>
    <link href="https://ss1.4sqi.net/styles/third_party/apisamples-0392cfe95c9fd32087ab6d80fcb80175.css" type="text/css" rel="stylesheet" />
    <script src="https://ss1.4sqi.net/scripts/apisamples-35608dc9c26343e74f5d99fc20bae6c5.js" type="text/javascript"></script>
    <script src="https://ss0.4sqi.net/scripts/third_party/jquery.ba-bbq-eddd4adf74d0c1310a401475178c57df.js" type="text/javascript"></script>
    <?php 
    echo "<script src=".BASE_URI."assets/js/leaflet.js></script>" ;
	?>
    <script type="text/javascript">L.Icon.Default.imagePath = '../../assets/img';</script>
    <script src="https://ss1.4sqi.net/scripts/third_party/wax.leaf.min-152e427ce5e0201f0982929193a7a53c.js" type="text/javascript"></script>

    <script type="text/javascript">
    //<![CDATA[

      /**
       * Sample application that uses the foursquare API, Leaflet, and the MapBox API
       * to show trending locations.
       */
      function Explore(apiKey, authUrl, apiUrl, mapboxId) {
        this.foursquare = new Foursquare(apiKey, authUrl, apiUrl);
        this.map = new L.Map('map')
          .setView(new L.LatLng(40.729515,-73.997188), 14);
        var map = this.map;
        var https = (location.protocol === 'https:'),
                    base_https = 'https://dnv9my2eseobd.cloudfront.net/v3/',
                    base = 'http://a.tiles.mapbox.com/v3/',
                    mapboxUrl = (https ? base_https : base) + mapboxId + '.jsonp';
        wax.tilejson(mapboxUrl, function(tilejson) {
          map.addLayer(new wax.leaf.connector(tilejson));
        });
        this.map.on('move', bind(this.onCenterChange, this));
		var popup = L.popup();

		function onMapClick(e) {
		    popup
		        .setLatLng(e.latlng)
		        .setContent("You clicked the map at " + e.latlng.toString())
		        .openOn(map);
		}
		map.on('click', onMapClick);
      }
	  
      /**
       * Trigger first data fetch.
       */
      Explore.prototype.run = function() {
        this.onCenterChange();
      }

      /**
       * When the map moves, fetch new venues. But do in a timeout so we don't burn through
       * our quota mid-drag.
       * @private.
       */
      Explore.prototype.onCenterChange = function() {
        if (this.timeout) { window.clearTimeout(this.timeout); this.timeout = null; }
        this.timeout = window.setTimeout(bind(function() {
          var center = this.map.getCenter();
          this.foursquare.trendingVenues(center.lat, center.lng, bind(this.onVenues, this));
        }, this), 1000);
      }

      /**
       * When venue search request returns, find trending group and display it.
       * @private
       */
      Explore.prototype.onVenues = function(venues) {
          for (var i = 0; i < venues.length; i++) {
          this.addTrendingMarker(venues[i])
          }
      }

      /**
       * Add markers to map for trending locations.
       */
      Explore.prototype.addTrendingMarker = function(venue) {
        var latLng = new L.LatLng(venue.location.lat, venue.location.lng);
        var marker = new L.Marker(latLng)
          .bindPopup(venue['name'] + ' (' + venue['hereNow']['count'] + ')')
          .on('mouseover', function(e) { this.openPopup(); })
          .on('mouseout', function(e) { this.closePopup(); });
        this.map.addLayer(marker);
      }
      //]]>

      $(function() {
        
          new Explore(
            '30JI5IYLPLVU5X5CQBYE105QLWOUBK0R0L0S2AD150W4OZJQ',
            'https://foursquare.com/',
            'https://api.foursquare.com/',
            /**
             * This is a sample map url that you need to change.
             * Sign up at http://mapbox.com/foursquare for a custom map url.
             */
            'jnozsc.map-bkybzcm2').run();
        
      })
    </script>
</head>
<body>
    <div id="map" style="width: 550px; height: 550px; position: absolute;"></div>
    <div id="content" style="margin-left: 610px">
      <h1>What's hot right now?</h1>
	  <?php
	  $json = file_get_contents("https://api.foursquare.com/v2/venues/search?ll=40.729515,-73.997188&oauth_token=0BF1V2B3JOLPJXSTFVRBRXHNEJ5LTIXBXYX3OSJ5PW5DLXEN&v=20130509");
	  $result = json_decode($json, true);
	  #dump($result);
	  if ($result['meta']['code']==200 ) {
		  ?>
		  <table class="table table-hover">
		  	<?php 
		  	# to do get notes number;
		  	#$note_num = 25;
		  	$index = 1;
			$datetime = time();
		  	#for ($index = 1; $index <= $note_num; $index++) {
		  		foreach ($result['response']['venues'] as $p){
		    ?>
		  	<tr class="info">
				<td><?php echo $index; $index+=1;?></td>
		  	    <td><?php echo $p['name'];?></td>
		  	    <td><?php echo $p['location']['lat'];?></td>
				<td><?php echo $p['location']['lng'];?></td>
				<td><?php echo $p['id'];?></td>
				<td><?php echo date("Y-m-d H:i:s", $datetime); ?></td>
		  	  </tr>
		  	<?php
		      }
		  	?>
    
		  </table>
		<?php  
	  }
	  ?>
      <br/>Hover over the markers in an area to see what's trending.
    </div>
</body>
</html>  
  