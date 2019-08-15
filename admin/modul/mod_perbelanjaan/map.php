
<?php

error_reporting(0);
include "config/koneksi.php";
  
  


 
    $sql="SELECT * FROM tbl_perbelanjaan where nama_perbelanjaan='$t[nama_perbelanjaan]'";

    $query = mysql_query($sql);
    $num = mysql_num_rows($query);
  
?>
 <script type="text/javascript"
      src="http://maps.google.com/maps/api/js?libraries=drawing&key=AIzaSyBrTNym8Jgs23ycdtuJ4HgkjXWMX5mPjhU"></script>
    <style type="text/css">
  #map {min-height: 300px;
min-width: 200px;
min-height: 485px;}
    </style>
    <script type="text/javascript">
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};
    
    /*
The following list shows the approximate level of detail you can expect to see at each zoom level:

    1: World
    5: Landmass/continent
    10: City
    15: Streets
    20: Buildings
    */
    var init_zoom_level = 11;
    var daikfocus = new google.maps.LatLng(-0.1679167,104.5507394);
    var lingga = new google.maps.LatLng(-0.4810216,104.4106637);
    var fokus = new google.maps.LatLng(<?php echo"$t[latitude]";?>,<?php echo"$t[longitude]";?>);

    var init_center = fokus;
      

      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function setSelection(shape) {
        clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function deleteSelectedShape() {
        if (selectedShape) {
          selectedShape.setMap(null);
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         var colorPalette = document.getElementById('color-palette');
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
         selectColor(colors[0]);
       }

      function initialize() {
        var map = new google.maps.Map(document.getElementById('map'), {
          //zoom: 10,
          zoom: init_zoom_level,
          //center: new google.maps.LatLng(22.344, 114.048),
          center: init_center,
          //mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeId: google.maps.MapTypeId.SATELLITE,
          disableDefaultUI: true,
          zoomControl: true
        });

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          //drawingMode: google.maps.drawing.OverlayType.POLYGON,
          drawingMode: google.maps.drawing.OverlayType.MARKER,
        
        
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
    
    // please do comment any drawing mode that you willing to disable
    // beware with  COMMA
        google.maps.drawing.OverlayType.MARKER 
        //google.maps.drawing.OverlayType.POLYGON,
        ////google.maps.drawing.OverlayType.POLYLINE,
        //google.maps.drawing.OverlayType.RECTANGLE,
        //google.maps.drawing.OverlayType.CIRCLE

      ]
    },        

          markerOptions: {
            draggable: true
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
      
      //for all non marker
            if (e.type != google.maps.drawing.OverlayType.MARKER) {
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);

            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
            var newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape);
            });
            setSelection(newShape);
          }else{
        //marker
        
        drawingManager.setDrawingMode(null);
        
        google.maps.event.addListener(e.overlay, 'drag', function() {
        //updateMarkerStatus('Sedang digeser...!!!');
        updateMarkerPosition(e.overlay.getPosition());
        });
    
      }
        });

        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
    
    //Attach DOM Listener when user click #delete-button
        //google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        //buildColorPalette();
      }
    
    function updateMarkerPosition(latLng) {
    //document.getElementById('latlong').value = 'Latitude:'+latLng.lat()+'\nLongitude:'+latLng.lng();
    document.getElementById('latitude').value = latLng.lat();
    document.getElementById('longitude').value = latLng.lng();
}
      google.maps.event.addDomListener(window, 'load', initialize);

      <?php
  if($num>0){
    echo 'var locations = ['."\r\n";
    $i=0;
    while($row = mysql_fetch_array($query)){
      echo '['.$row['latitude'].','.$row['longitude'].',"'.$row['nama_perbelanjaan'].'","'.$row['kategori'].'","'.$row['alamat'].'","'.$row['latitude'].'","'.$row['longitude'].'","'.$row['foto'].'"]';
      if($i<$num-1) 
        echo ','."\r\n";
      else 
        echo "\r\n";
      $i++;
    }
    echo ']'."\r\n";
  }
?>
    function initialize() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17,
      center: new google.maps.LatLng(<?php echo"$t[latitude]";?>,<?php echo"$t[longitude]";?>),
      mapTypeId: google.maps.MapTypeId.MAP
      //mapTypeId: google.maps.MapTypeId.SATELLITE
    });
  
    var infowindow = new google.maps.InfoWindow();
  
    var marker, i;
  
    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
        map: map,
        icon: 'img/marker/greenpin.png'
      });
      
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent("Objek Wisata : "+locations[i][2]+"<br />Kategori : "+locations[i][3]+"<br />Alamat : "+locations[i][4]+"<br />Latitude : "+locations[i][5]+"<br />Longitude : "+locations[i][6]+"<br /><br /><img src='img/gallery/belanja/"+locations[i][7]+"' width='250' height='150'>\n");
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  }
  
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head> 
<body>  
<div align="left"><span class="style1"></span></div>

    </script>
<div id="map"></div>