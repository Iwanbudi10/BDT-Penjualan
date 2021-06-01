<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['kode_plg'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$kode_plg = $_GET['kode_plg'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_plg='$kode_plg'") or die(mysqli_error($koneksi));

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
			$kode_plg			  = $_POST['kode_plg'];
			$nama_plg	= $_POST['nama_plg'];

			$sql = mysqli_query($koneksi, "UPDATE pelanggan SET kode_plg='$kode_plg', nama_plg='$nama_plg' WHERE kode_plg='$kode_plg'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_plg";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_plg&kode_plg=<?php echo $kode_plg; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Pelanggan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kode_plg" class="form-control" size="4" value="<?php echo $data['kode_plg']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_plg" class="form-control" value="<?php echo $data['nama_plg']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_plg" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
