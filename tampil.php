<?php
//memasukkan file config2.php
include('config2.php');
?>
<!--
	<form action="import.php" method="post"  enctype="multipart/form-data">
	<div class="mb-3">
	<label for="formFile" class="form-label">Import File</label>
	<input class="form-control" type="file" id="formFile" name="exel_file">
	<button type="submit" class="btn btn-success mt-3" name="save_exel_file">Save File</button>
	</div>
	</form>
-->
	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Beasiswa Nasional</font></center>
		<hr>
		<a href="index2.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>id</th>
					<th>Tanggal Upload</th>
					<th>Nama Beasiswa</th>
					<th>Deskripsi Beasiswa</th>
					<th>Syarat Beasiswa</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel beasiswa_nasional urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM beasiswa_nasional ORDER BY id ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['id'].'</td>
							<td>'.$data['tanggal_upload'].'</td>
							<td>'.$data['Nama_Beasiswa'].'</td>
							<td>'.$data['Deskripsi_Beasiswa'].'</td>
							<td>'.$data['Syarat_Beasiswa'].'</td>
							<td>
								<a href="index2.php?page=edit_mhs&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
