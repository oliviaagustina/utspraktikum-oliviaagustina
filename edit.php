<?php include('config2.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel beasiswa_internasional berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM beasiswa_internasional WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$tanggal_upload		  = $_POST['tanggal_upload'];
			$Nama_Beasiswa			  = $_POST['Nama_Beasiswa'];
			$Deskripsi_Beasiswa	= $_POST['Deskripsi_Beasiswa'];
			$Syarat_Beasiswa	= $_POST['Syarat_Beasiswa'];

			$sql = mysqli_query($koneksi, "UPDATE beasiswa_nasional SET tanggal_upload='$tanggal_upload', Nama_Beasiswa='$Nama_Beasiswa', Deskripsi_Beasiswa='$Deskripsi_Beasiswa', Syarat_Beasiswa='$Syarat_Beasiswa' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index2.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index2.php?page=edit_mhs&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Upload</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_upload" class="form-control" value="<?php echo $data['tanggal_upload']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Beasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Beasiswa" class="form-control" value="<?php echo $data['Nama_Beasiswa']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Beasiswa</label>
				<div class="col-md-6 col-sm-6 ">
					<textarea class="form-control" name="Deskripsi_Beasiswa" rows="3" value="<?php echo $data['Deskripsi_Beasiswa']; ?>" required></textarea>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Syarat Beasiswa</label>
				<div class="col-md-6 col-sm-6">
					<textarea class="form-control" name="Syarat_Beasiswa" rows="3" value="<?php echo $data['Syarat_Beasiswa']; ?>"required></textarea>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index2.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
