    <script>
      $(document).ready(function(){
        $('#fasilitas').multipleSelect({
          placeholder: 'Pilih Propinsi',
          filter:true
        });
      });
    </script>
<select id='fasilitas' name='fasilitas[]' multiple='multiple'  style='width:200px'>
      <option value='JKT'>DKI Jakarta</option>
      <option value='BTN'>Banten</option>
      <option value='JABAR'>Jawa Barat</option>
      <option value='JATENG'>Jawa Tengah</option>
      <option value='JATIM'>Jawa Timur</option>
      <option value='DIY'>DI Yogyakarta</option>
    </select>
		</form>
