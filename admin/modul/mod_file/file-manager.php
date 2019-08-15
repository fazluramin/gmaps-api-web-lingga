<?php
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Menuatas
  default:

    echo "
    <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-picture'></i><font color='grey'> File Manager</font></a> 
          </li>
        </ul></font>
      </div>

			<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header well' data-original-title>
						<h2><i class='icon-picture'></i><font color='green'> File Manager</h2></font>
						<div class='box-icon'>
							<!--<a href='#' class='btn btn-setting btn-round'><i class='icon-cog'></i></a>-->
							<a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
							<a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<div class='alert alert-info'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<i class='icon-info-sign'></i> Kelola data file sistem informasi.
						</div>
						<div class='file-manager'></div>
							<br>
					</div></div>
				</div><!--/span-->
			</div><!--/row-->
			</div><!--/#content.span10-->
	

	";
    break;
}?>
