<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$kode_brg			= $_POST['kode_brg'];
			$nama_brg			= $_POST['nama_brg'];
			$harga	= $_POST['harga'];

			$cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_brg='$kode_brg'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO barang(kode_brg, nama_brg, harga) VALUES('$kode_brg', '$nama_brg', '$harga')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_brg";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Kode barang sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_brg" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Barang</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="kode_brg" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_brg" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="harga" class="form-control" required>
				</div>
			</div>
		
			<!-- <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik SipilL">Teknik Sipil</option>
						<option value="Teknik Kimia">Teknik Kimia</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="Manajemen">Manajemen</option>
						<option value="Farmasi">Farmasi</option>
						<option value="Hukum">Hukum</option>
						<option value="Kedokteran">Kedokteran</option>
					</select>
				</div>
			</div> -->
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
