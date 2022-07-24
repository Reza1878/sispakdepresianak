<?php
	include 'header.php';
	include '../class/class_gejala.php';
	include '../class/class_gambar.php';
	$obj			= new gejala($cn);
	$obj_gbr 	= new gambar(); 
	$id  			= ($_GET['id']) ? $_GET['id'] : '';
	
	if(isset($_POST['simpan']))
	{
		$namafl ='';
		if(isset($_FILES['namafile']) && !empty($_FILES['namafile']['name']))
		{
			$datafile 				= $_FILES["namafile"];
			$namafile 				= $datafile["name"];
			$tipe 						= $datafile["type"];
			$ukuran 					= $datafile["size"];
			$file_sementara 	= $_FILES["namafile"]["tmp_name"];
			$date							= date("Ymdhis");
			$namafl	 				  = $date."-".$namafile;
			$obj_gbr->upload($namafl,$tipe,$ukuran,$file_sementara);
		}
			
		$a	 	= trim(strtoupper($_POST['t1']));
		$b		= trim(strtoupper($_POST['t2']));
		
		$obj->gejala_update($a,$b,$namafl,$id);
	}		
?>
<script>
	document.getElementById("gejala").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>

<!-- Form Input Data-->
<!-- Form Input Data-->
<div id="content">
	<div class="input-form" >
		<div class="w3-container w3-orange" >
			<h2>Edit Master gejala</h2>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
		<table class='tbl2'>
			<tr>
				<td width='100'><label class="w3-text-blue">Kode gejala</label></td>
				<td width='250'><input type='text' name='t1' value='<?php echo $obj->gejala_pilih('1',$id) ?>' class="w3-input w3-border w3-sand"/></td>
			</tr>
			<tr>
				<td>	<label class="w3-text-blue">Nama gejala	</label></td>
				<td><input type='text' name='t2' value='<?php echo $obj->gejala_pilih('2',$id) ?>' class="w3-input w3-border w3-sand"/></td>
			</tr>
			<tr>
				
			</tr>
			<tr>
				<td><label class="w3-text-blue">Gambar</label></td>
				<td><input class="w3-input w3-border w3-sand" type="file"  name="namafile" ></td>
			</tr>
			<tr height='30'></tr>
			<tr>
				<td colspan='2'><center>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
				<a href='view_gejala.php' class="btn btn-besar btn-hijau">Batal</a>
				</center></td>
			</tr>
		</table>
		</form>
		<div class="w3-container w3-orange">
			<p>Note: masukan data gejala dengan benar</p>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>

