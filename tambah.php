<?php include('config.php'); ?>

		<center><font size="6">Form Akun Saya</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$no_ktp			= $_POST['no_ktp'];
			$nama_lengkap	= $_POST['nama_lengkap'];
			$provinsi		= $_POST['provinsi'];
			$alamat			= $_POST['alamat'];
            $no_hp			= $_POST['no_hp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM tb_profil WHERE no_ktp='$no_ktp'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tb_profil(no_ktp, nama_lengkap, provinsi, alamat, no_hp) VALUES('$no_ktp', '$nama_lengkap', '$provinsi', '$alamat', '$no_hp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NO KTP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Ktp</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="no_ktp" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_lengkap" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Provinsi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
					<option value="">Pilih Provinsi</option>
					<?php
						//query ke database SELECT tabel provinsi urut berdasarkan id yang paling besar
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_provinsi ORDER BY id DESC") or die(mysqli_error($koneksi));

						//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
						if(mysqli_num_rows($sql) > 0){
							//membuat variabel $no untuk menyimpan nomor urut
							$no = 1;
							//melakukan perulangan while dengan dari dari query $sql
							while($data = mysqli_fetch_assoc($sql)){
								//menampilkan data perulangan
								echo '<option value="'.$data['nama_provinsi'].'">'.$data['nama_provinsi'].'</option>';
								$no++;
							}
						//jika query menghasilkan nilai 0
				}else{
					echo '<option value="">-</option>';
				}
					?>
						<option value="Teknik Informatika">Aceh</option>
						<option value="Teknik SipilL">Sumatra Utara</option>
						<option value="Teknik Kimia">Sumatra Barat</option>
						<option value="Teknik Elektro">Riau</option>
						<option value="Akuntansi">Kepulauan Riau</option>
						<option value="Manajemen">Jambi</option>
						<option value="Farmasi">Bengkulu</option>
						<option value="Hukum">Sumatra Selatan</option>
						<option value="Kedokteran">Lampung</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No HP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_hp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
