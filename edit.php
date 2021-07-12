<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['no_ktp'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$no_ktp = $_GET['no_ktp'];

			//query ke database SELECT tabel tb_profil berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tb_profil WHERE no_ktp='$no_ktp'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">NO KTP tidak ada dalam database.</div>';
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
			$nama_lengkap			  = $_POST['nama_lengkap'];
			$alamat	= $_POST['alamat'];
			$provinsi	= $_POST['provinsi'];
            $no_hp	= $_POST['no_hp'];

			$sql = mysqli_query($koneksi, "UPDATE tb_profil SET nama_lengkap='$nama_lengkap', alamat='$alamat', provinsi='$provinsi', no_hp='$no_hp' WHERE no_ktp='$no_ktp'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit&no_ktp=<?php echo $no_ktp; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No KTP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_ktp" class="form-control" size="4" value="<?php echo $data['no_ktp']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Provinsi</label>
				<div class="col-md-6 col-sm-6">
					<select name="provinsi" class="form-control" required>
						<option value="">Pilih Provinsi</option>
						<?php
						//query ke database SELECT tabel provinsi urut berdasarkan id yang paling besar
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_provinsi") or die(mysqli_error($koneksi));

						//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
						if(mysqli_num_rows($sql) > 0){
							//membuat variabel $no untuk menyimpan nomor urut
							$no = 1;
							//melakukan perulangan while dengan dari dari query $sql
							while($data_prov = mysqli_fetch_assoc($sql)){
								//menampilkan data perulangan
								if($data['provinsi'] == $data_prov['nama_provinsi']){
									echo '<option value="'.$data_prov['nama_provinsi'].'" selected>'.$data_prov['nama_provinsi'].'</option>';
								}else{
									echo '<option value="'.$data_prov['nama_provinsi'].'">'.$data_prov['nama_provinsi'].'</option>';
								}
								$no++;
							}
						//jika query menghasilkan nilai 0
						}else{
							echo '<option value="'.$data_prov['nama_provinsi'].'">'.$data_prov['nama_provinsi'].'</option>';
						}
							?>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No HP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
