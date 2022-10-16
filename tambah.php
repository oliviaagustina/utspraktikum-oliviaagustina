<?php include('config2.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$tanggal_upload			= $_POST['tanggal_upload'];
			$Nama_Beasiswa			= $_POST['Nama_Beasiswa'];
			$Deskripsi_Beasiswa	= $_POST['Deskripsi_Beasiswa'];
			$Syarat_Beasiswa		= $_POST['Syarat_Beasiswa'];

			$cek = mysqli_query($koneksi, "SELECT * FROM beasiswa_nasional WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO beasiswa_nasional(id, tanggal_upload, Nama_Beasiswa, Deskripsi_Beasiswa, Syarat_Beasiswa) VALUES('$id', '$tanggal_upload', '$Nama_Beasiswa', '$Deskripsi_Beasiswa', '$Syarat_Beasiswa')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index2.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index2.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Upload</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_upload" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Beasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Beasiswa" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Beasiswa</label>
				<div class="col-md-6 col-sm-6 ">
					<textarea class="form-control" name="Deskripsi_Beasiswa" rows="3" required></textarea>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Syarat Beasiswa</label>
				<div class="col-md-6 col-sm-6">
				<textarea class="form-control" name="Syarat_Beasiswa" rows="3" required></textarea>	
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
