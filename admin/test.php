
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>
<li class="active"><i class="fa fa-list-alt"></i>&nbsp;Fasilitas Lapangan</li>
<li class="active"><i class="fa fa-edit"></i>&nbsp;<?php echo ucfirst($y['nama_lapangan']); ?></li>
</ol>

<div class="row">

<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-edit"></i>&nbsp;<b>Edit Fasilitas Lapangan : <?php echo ucfirst($y['nama_lapangan']); ?></b></div>
<div class="panel-body">
   
<!-- <a href="index.php?content=ikaryawan"><button class="btn btn-primary">Input Karyawan Baru</button></a>
<hr/>
 -->
   <!-- Akhir section -->
    <script>
     $(document).ready(function() {
      var table = $('#example').DataTable();
     } );
     </script>
                <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
        <script type='text/javascript' src='nicEdit.js'></script>
        <script type='text/javascript'>
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>  
    <section>   
      <div class="row">
        <div class="col-sm-12">
      
      <form method="POST" action="index.php?aksi=editlapangan_futsal" ENCTYPE="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <table id="example" class="table" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
          <tr>
             <td width="70%">
             <textarea name='isi' style='width: 630px; height: 370px;'>

       

             </textarea></td>
          
          </tr>

  <tr>
            <td colspan="3">
            <br> 
            <?php echo "<button type='submit' name='submit' class='btn btn-round btn-success' onClick=\"return confirm('Simpan data lapangan baru?');\">"; ?><i class="fa fa-save"></i>&nbsp;Simpan </button>
            <a href="index.php?content=lapangan_futsal"><button type="button" class="btn btn-round btn-danger"><i class="fa fa-backward"></i>&nbsp;Kembali</button></a>
            <button class="btn btn-round btn-warning" type="reset"><i class="fa fa-refresh"></i>&nbsp;Default</button>
            </td>
          </tr>

        </table></div></div>
        </form>
<!-- Back Navbar -->


        </div>
      </div>
    </section>

<!-- /Akhir section -->















        </div>
      </div>

   		
   
  </div>


 