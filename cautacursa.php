<?php
session_start();
include_once("db_connect.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Carpool Iasi</title>
      <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="style/slider.css">
  <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <style type="text/css">
        .container {
            margin-top: 40px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    <script type='text/javascript'>
        $( document ).ready(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
  </head>
  <body>
    <div class="allcontain">
  <div class="header">
      <ul class="socialicon">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
      </ul>
      <ul class="givusacall">
        <li>Give us a call: 0756783706 </li>
      </ul>
      <ul class="logreg">

        <li><a href="logout.php"><?php if(isset($_SESSION['user_name'])) {echo "Log Out";}?></a></li>
        <li><?php if(isset($_SESSION['user_name'])) {
          echo "<s-pan>";
          echo $_SESSION['user_name'];
          echo "</span>";
          }?> </li>
      </ul>
  </div>
  <!-- Navbar Up -->
  <nav class="topnavbar navbar-default topnav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
          <span class="sr-only"> Toggle navigaion</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>   
    </div>
    <div class="collapse navbar-collapse" id="upmenu">
      <ul class="nav navbar-nav" id="navbarontop">
        <li class="active"><a href="index.php">HOME</a> </li>
        <li>
          <a href="contact.php">CONTACT</a>
        </li>
        <li>
          <a href="cautacursa.php">Cauta o cursa</a>
        </li>
        <li>
          <a href="oferacursa.php">Ofera o cursa</a>
        </li>
        <li>
          <a href="profilulmeu.php">Profilul meu</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Alege punct de plecare si destinatie 
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">Toate</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Locatie</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Adresa</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocoduri</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location">
      </div>
    </div>
    
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>

<div class="container">
   <div class="panel panel-primary">
      <div class="panel-heading">&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;Alege data si ora plecarii</div>
      <div class="panel-body">
            <div class='col-md-6'>
               <div class="form-group">
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' class="form-control" id="data" />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>

         </div>
         <input onclick="submitCautaCursa()" type="submit" class="btn btn-primary" value="Submit">
      </div>
   </div>
</div>

    
  <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      var ordine;
      var startx;
      var starty;
      var finishx;
      var finishy;
      var nr = 0;
      var markerStart;
      var markerFinish;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 47.17, lng: 27.57},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker, marker2;

        autocomplete.addListener('place_changed', function() {
          //infowindow.close();
          //marker.setVisible(false);
          if(nr<2){
            document.getElementById('pac-input').value = "";

            var place = autocomplete.getPlace();
            if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(8);  // Why 17? Because it looks good.
          }
          if(nr==0)
            markerStart = new google.maps.Marker({
              position: place.geometry.location,
              map: map,
              title: "111111"
            });
          else{
            markerFinish = new google.maps.Marker({
              position: place.geometry.location,
              map: map,
              title: "111111"
            });

            var request = {
              origin: {lat: markerStart.getPosition().lat(),
                       lng: markerStart.getPosition().lng()},
              destination: {lat: markerFinish.getPosition().lat(), 
                            lng: markerFinish.getPosition().lng()},
              travelMode: google.maps.DirectionsTravelMode.DRIVING
            };

            var directionsDisplay = new google.maps.DirectionsRenderer({map:map,suppressMarkers: true,
             suppressInfoWindows: true, polylineOptions: { strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 5}});
            var directionsService = new google.maps.DirectionsService();

            directionsService.route(request, function(response, status){
              console.log(status)
              if(status=='OK'){
                directionsDisplay.setDirections(response);

                var directions = directionsDisplay.getDirections();
                        // Display the distance:
                  console.log(directions)
                  var km = directions.routes[0].legs[0].distance.text;
                        // Display the duration:
                  var time = directions.routes[0].legs[0].duration.text;

                  var path = directions.routes[0].overview_path;

                  ordine = parseInt(path.length);
                  console.log(ordine);
                  startx = formatstartx(path);
                  console.log(startx);
                  starty = formatstarty(path);
                  console.log(starty);
                  finishx = formatfinishx(path);
                  console.log(finishx);
                  finishy = formatfinishy(path);
                  console.log(finishy);
              }})
          }


          nr=nr+1;
          var address = '';
          if (place.address_components) {
            address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          // infowindowContent.children['place-icon'].src = place.icon;
          // infowindowContent.children['place-name'].textContent = place.name;
          // infowindowContent.children['place-address'].textContent = address;
          // infowindow.open(map, marker);
        }
        else{
          alert("Ati ales deja punctul de plecare si destinatia")
        }
      });

        // function format(path, data, index, pos)
        // {
        // 	var item = {};
        // 	item["x"] = path[index].lat();
        // 	item["y"] = path[index].lng();
        // 	data[pos] = item;
        // }

        function formatstartx(path) {

        	var sstartx = path[0].lat();
        	return sstartx;
        }
        function formatstarty(path) {
        	var sstarty = path[0].lng();
        	return sstarty;
        }
        function formatfinishx(path) {
        	var ffinishx = path[path.length - 1].lat();
        	return ffinishx;
        }
        function formatfinishy(path) {
        	 var ffinishy = path[path.length - 1].lng();
        	return ffinishy;
        }


   

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
        .addEventListener('click', function() {
          console.log('Checkbox clicked! New state=' + this.checked);
          autocomplete.setOptions({strictBounds: this.checked});
        });

      }

            function submitCautaCursa(){ 
      	var date = $("#data").val();
      	var dates = date.split(" ");
        var usr_id = "<?php echo $_SESSION['user_id']; ?>";
  		console.log(dates);
  		    var datess = dates[0];
  		    var data = datess.replace("/","-");
  		    var datess = data.replace("/","-");
  		    var data = datess.split("-");
  		    var str1 = data[2];
    	var str2 = "-";
   		var res = str1.concat(str2);
    	var str1 = data[0];
    	var res = res.concat(str1);
    	var res = res.concat(str2);
    	var str1 = data[1];
    	var res = res.concat(str1);
  		    // var datess = data[1] + "-" + data[0].
  		    console.log(res);
        	var time = dates[1];
        	var times = time.split(":");
        	var time = times[0]+times[1];
        	if(dates[2]=="PM")
        	{
        		var x = parseInt(time);
        		var time = x + 1200;
        	}
        	var timess = time.toString();
        	console.log(timess);
        console.log(usr_id);
                  console.log(startx);
                  console.log(starty);
                  console.log(finishx);
                  console.log(finishy);
        $.ajax({
          url: "http://localhost/Licienta/Punct/search.php?usr_id=" + usr_id + "&data=" + res + "&ora=" + timess + "&startx=" + startx + "&starty=" + starty + "&finishx=" + finishx + "&finishy=" + finishy +  "&ordine=" + ordine,
          type: "GET",
          success: function(result) {
          	 console.log("succes");
          },
          error: function(xhr, resp, text) {
             console.log("faaa",xhr, resp, text);
         }
  		});

  		window.alert("Calatoria dumneavoastra a fost cautata si o puteti vizualiza in pagina Profilul meu");
    }

     


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8g1si5QBzvJIWmZHcG4cTeObPo6AUyOc&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>