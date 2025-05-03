<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="assets/css/style77ae.css?ver=2" rel="stylesheet" />

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Store</title>

  <style>
        #map {
            height: 400px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            border: 8px solid #fff;
            box-shadow: 2px 1px 1px 4px #ccc;
        }
        /* Optional: Makes the sample page fill the window. */
        
        
        
        #pac-input,
        #location-address {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 5px 15px;
            text-overflow: ellipsis;
            width: 95%;
            margin: 20px;
        }
        
        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>

</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <?php include("includes/header.php"); ?>

       <?php include("includes/sidebar.php"); ?>

       <!--start content-->
       <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Store</div>
            <div class="ms-auto">
							<a href="store.php" class="btn btn-primary">View Stores</a>
					</div>
				</div>
				<!--end breadcrumb-->
       
				<div class="row">
        
            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <form class="row g-3">
                  <div class="col-6">
                    <label class="form-label">Store Name</label>
                    <input type="text" class="form-control">
                  </div>                 
                  
                  <div class="col-6">
                    <label class="form-label">Owner Name</label>
                    <input type="text" class="form-control">
                  </div> 
                  
                  <div class="col-6">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control">
                  </div>
                  
                  <div class="col-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control">
                  </div>
                  <h5>Address</h5>
                  <div class="col-12">
                      <input id="pac-input" type="text" placeholder="Enter a location">
                      <div id="map"></div>
                      <div id="location-address"></div>
                      <input id="address" type="hidden" value="Hyderabad">
                  </div>                 
                  
                    
                  <div class="col-6">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control">
                  </div>    
                  <div class="col-6">
                    <label class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>           
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                  </div>
                </form>
              </div>
              </div>
            </div>
            
				</div>
				<!--end row-->
        

			</main>
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
       

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBH1e4TmV-1U6kNyXuCOz2POdiSWqLdyEo&amp;libraries=places&amp;input=Vict&amp;types;=geocode"></script>

    <!--app-->
  <script src="assets/js/app.js"></script>
  
  <script>
        var geocoder;
        var map;
        var marker;
        var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 50)
        });

        function initMap() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(51.530633, -0.093570);
            var mapOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var input = document.getElementById('pac-input');

            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);

            var address = document.getElementById('address').value;
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    if (marker) {
                        marker.setMap(null);
                        if (infowindow) infowindow.close();
                    }
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });
                    google.maps.event.addListenerOnce(map, 'idle', function() {

                        google.maps.event.trigger(map, 'resize');

                    });
                    google.maps.event.addListener(marker, 'dragend', function() {

                        geocodePosition(marker.getPosition());
                    });

                    google.maps.event.trigger(marker, 'click');
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

            autocomplete.addListener('place_changed', function() {

                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(50); // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || ''),
                        (place.address_components[3] && place.address_components[3].short_name || ''),
                        (place.address_components[4] && place.address_components[4].short_name || ''),
                        (place.address_components[5] && place.address_components[5].short_name || '')
                    ].join(' ');
                }

                document.getElementById('location-address').innerHTML = place.name + ', ' + address;

            });

        }

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    marker.formatted_address = responses[0].formatted_address;
                } else {
                    marker.formatted_address = 'Cannot determine address at this location.';
                }

               document.getElementById('location-address').innerHTML = marker.formatted_address + ' Lattitude:' + marker.getPosition().lat() + ' Langitude:' + marker.getPosition().lng();
              // document.getElementById('location-address').innerHTML = 'Lattitude:' + marker.getPosition().lat() + ' Langitude:' + marker.getPosition().lng();
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH1e4TmV-1U6kNyXuCOz2POdiSWqLdyEo&libraries=places&callback=initMap" async defer></script>
</body>

</html>