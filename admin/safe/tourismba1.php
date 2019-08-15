<?php
$aksi="modul/mod_tourism/aksi_tourism.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_owisata ORDER BY id_wisata DESC");
      
      echo "
  <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-map-marker'></i><font color='grey'> Objek Wisata</font></a> <span class='divider'></span>
          </li>
        </ul></font>
      </div>
      
<div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-map-marker'></i><font color='green'> Objek Wisata</font></h2>&nbsp;|&nbsp;
            <a href='?module=tourism&act=input' type=button class='btn btn-success'><i class='icon-plus-sign icon-white'></i> Add Data</br></a>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
            <font color='black'><table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%'>
              <thead>
                <tr>
          <th width='1%'><center><style='text-decoration:none'>No</th>
          <th width='18%'><center><i class='icon-globe'></i> Objek Wisata</th>
          <th width='5%'><center><i class='icon-picture'></i> Foto</th>
          <th width='8%'><center><i class='icon-inbox'></i> Kategori</th>         
          <th width='25%'><center><i class='icon-map-marker'></i> Titik Lokasi</th>         
          <th width='27%'><center><i class='icon-wrench'></i> Action</th>     
                </tr>
              </thead>   

             
"; 
       $no+=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
            <td><center>".$no."</td>
            <td><center>$r[nama_owisata]</b></font></td>
            <td><center><li class='thumbnail'>
    <a title='$r[foto]' href='img/npenting/$r[foto]'><img src='img/npenting/$r[foto]' width='140' height='75'></td>
            <td><center>$r[kategori]</td>
            <td><i class='icon-screenshot'></i> Latitude </a> :$r[latitude]
            <br><i class='icon-screenshot'></i> Longitude </font> : $r[longitude]
            </td>";
      
        echo"
                <td class='center'><center>
                  <a href='?module=detail&id=$r[id_wisata]' class='btn btn-success' href='#'>
                    <i class='icon-zoom-in icon-white'></i>  
                    Detail                                            
                  </a>
                 <a href='?module=tourism&act=update&id=$r[id_wisata]' onclick=\"return confirm('Apakah anda yakin ingin mengubah data objek wisata $r[nama_owisata]?')\" class='btn btn-warning' href='#'>
                    <i class='icon-edit icon-white'></i>  
                    Edit                                            
                  </a>
                  <a href=$aksi?module=tourism&act=hapus&id=$r[id_wisata] onclick=\"return confirm('Apakah anda yakin ingin menghapus objek wisata $r[nama_owisata]?')\" class='btn btn-danger' href='#'>
                    <i class='icon-trash icon-white'></i> 
                    Delete
                  </a>
               ";
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
    ";



    break;
  
  

  

  
  case "update":
       $tampil = mysql_query("SELECT * FROM tbl_owisata WHERE id_wisata='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
<div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
             <a href='index.php?module=tourism' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i> Objek Wisata</font></a> <span class='divider'></span>
          <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-edit'></i><font color='grey'> Edit Data</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2>
            <a href='index.php?module=tourism' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> 
            <font color='green'> Edit Objek Wisata : $t[nama_owisata]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

<form method=POST enctype='multipart/form-data' action=$aksi?module=tourism&act=update>
<input type=hidden name=id value=$t[id_wisata]>
    <table  class='table table-striped table-bordered bootstrap-datatable ' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
    <tr><td width='12%'><label class='control-label'>Objek Wisata</td><td width='23%'><input type='text' name='nama_owisata' value='$t[nama_owisata]' style='width: 220px;' placeholder='Nama Objek Wisata'></td>
    
    <td width='140' height='400' rowspan='6' colspan='2' style='text-align: left'><center>
    Latitude : <input type='text' name='latitude' id='latitude' value='$t[latitude]' style='width: 220px;'> &nbsp;&nbsp;&nbsp;&nbsp;
    Longitude : <input type='text' name='longitude' id='longitude'value='$t[longitude]' style='width: 220px;'>
    <br>
    <div id='map'></div>
    </td></tr>

    <tr><td>Kategori</td><td><select name='kategori' data-placeholder='$t[kategori]' data-rel='chosen' style='width: 230px;'>
                    <option name='kategori' value=''></option>
                    <optgroup label='Kategori Wisata'>
                      <option value='Wisata Alam'>Wisata Alam</option>
                      <option value='Wisata Belanja'>Wisata Belanja</option>
                      <option value='Wisata Buatan'>Wisata Buatan</option>
                      <option value='Wisata Religi'>Wisata Religi</option>
                      <option value='Wisata Sejarah'>Wisata Sejarah</option>                      
                    </optgroup>
                  </select></td></tr>
    <tr><td>Alamat</td><td><textarea type='text' name='alamat' style='width: 220px; height: 130px;' placeholder='Alamat Lokasi Objek Wisata'>$t[alamat]</textarea></td></tr>
    <tr><td>Fasilitas</td><td><select data-placeholder='Pilih Kategori Wisata' name='fasilitas'  multiple data-rel='chosen' style='width: 230px; height: 120px;'>
                  <option>Tempat Makan</option>
                  <option>Gazebo</option>
                  <option>Taman Bermain</option>
                  <option>Kamar Kecil</option>
                  <option>Penginapan</option>
                  <option>Perlengkapan Renang</option>
                  <option>Free Wifi</option>
                  <option>Mushola</option>
                  <option>Parkir</option>
                  <option>Khusus Anak</option>
                  </select></td></tr>    
    <tr><td>Foto</td><td ><input type='file' name='fupload' style='width: 220px;'></td></tr>
  
    <tr><td>Kata Pengantar</td><td colspan='2'>

    <textarea class='cleditor' id='textarea2' name='pengantar' rows='3' cols='40' type='text' style='width: 900px; height: 250px;'>$t[pengantar]</textarea>
    </td></tr>
  </table>
<div class='form-actions'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type='submit' name='Submit' value='Simpan Data' class='btn btn-success'>&nbsp;&nbsp;<input type='reset' name='Submit' value='Clear'  class='btn btn-primary'>-->
<button type='submit' name='Submit' class='btn btn-success'><i class='icon icon-white icon-save'></i> Simpan Perubahan</button>&nbsp;&nbsp;<button type='reset' name='Submit' class='btn btn-warning'><i class='icon icon-white icon-refresh'></i> Clear</button>
    
</form>
</div></div></div></div>
</div></div></div></div>



  </div></div>";
   break;
  

  

  
  case "input":
    echo "
      <div>
        <ul class='breadcrumb'>
         <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=tourism' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i><font color='black'> Objek Wisata</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-plus'></i><font color='grey'> Tambah Objek Wisata</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>
      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>

            <h2>
            <a href='index.php?module=tourism' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> &nbsp;
            <i class='icon-map-marker'></i><font color='green'> Tambah Objek Wisata</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

  <form method=POST enctype='multipart/form-data' action=$aksi?module=tourism&act=input>
  <table  class='table table-striped table-bordered bootstrap-datatable ' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
    <tr><td width='12%'><label class='control-label'>Objek Wisata</td><td width='23%'><input type='text' name='nama_owisata' value='$t[nama_owisata]' style='width: 220px;' placeholder='Nama Objek Wisata'></td>
    
    <td width='140' height='400' rowspan='6' colspan='2' style='text-align: left'><center>
    Latitude : <input type='text' name='latitude' id='latitude' style='width: 220px;'> &nbsp;&nbsp;&nbsp;&nbsp;
    Longitude : <input type='text' name='longitude' id='longitude' style='width: 220px;'>
    <br>
    <div id='map'></div>
    </td></tr>

    <tr><td>Kategori</td><td><select name='kategori' data-placeholder='Pilih Kategori Wisata' data-rel='chosen' style='width: 230px;'>
                    <option name='kategori' value=''></option>
                    <optgroup label='Kategori Wisata'>
                      <option value='Wisata Alam'>Wisata Alam</option>
                      <option value='Wisata Belanja'>Wisata Belanja</option>
                      <option value='Wisata Buatan'>Wisata Buatan</option>
                      <option value='Wisata Religi'>Wisata Religi</option>
                      <option value='Wisata Sejarah'>Wisata Sejarah</option>                      
                    </optgroup>
                  </select></td></tr>
    <tr><td>Alamat</td><td><textarea type='text' name='alamat' style='width: 220px; height: 130px;' placeholder='Alamat Lokasi Objek Wisata'>$t[alamat]</textarea></td></tr>
    <tr><td>Fasilitas</td><td>
   ";?><?php
   include "multi/demo2.php";
   ?>
<?php echo"


   <!-- <select data-placeholder='Pilih Kategori Wisata' name='fasilitas' data-rel='chosen' multiple='multiple' style='width: 230px; height: 120px;'>
                  <option multiple='multiple' value='Gazeboo'>Tempat Makan</option>
                  <option multiple='multiple' value='Gazeboo'>Gazebo</option>
                  <option multiple='multiple'>Taman Bermain</option>
                  <option multiple='multiple'>Kamar Kecil</option>
                  <option multiple='multiple'>Penginapan</option>
                  <option multiple='multiple'>Perlengkapan Renang</option>
                  <option multiple='multiple'>Free Wifi</option>
                  <option multiple='multiple'>Mushola</option>
                  <option multiple='multiple'>Parkir</option>
                  <option multiple='multiple'>Khusus Anak</option>
                  </select>--></td></tr>    
    <tr><td>Foto</td><td ><input type='file' name='fupload' style='width: 220px;'></td></tr>
  
    <tr><td>Kata Pengantar</td><td colspan='2'>

    <textarea class='cleditor' id='textarea2' name='pengantar' rows='3' cols='40' type='text' style='width: 900px; height: 250px;'>$t[pengantar]</textarea>
    </td></tr>
  </table>
<div class='form-actions'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type='submit' name='Submit' value='Simpan Data' class='btn btn-success'>&nbsp;&nbsp;<input type='reset' name='Submit' value='Clear'  class='btn btn-primary'>-->
<button type='submit' name='Submit' class='btn btn-success'><i class='icon icon-white icon-save'></i> Simpan Data</button>&nbsp;&nbsp;<button type='reset' name='Submit' class='btn btn-warning'><i class='icon icon-white icon-refresh'></i> Clear</button>
    
</form>
</div></div></div></div>
</div></div></div></div>



  </div></div>";
   break;
  
}
?>
</div></div></div></div></div></div></div></div></div></div>


 <script type="text/javascript"
      src="http://maps.google.com/maps/api/js?libraries=drawing&key=AIzaSyBrTNym8Jgs23ycdtuJ4HgkjXWMX5mPjhU"></script>
    <style type="text/css">
  #map {min-height: 300px;
min-width: 200px;
height: 100%;}
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

    var init_center = lingga;
      

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
    </script>

