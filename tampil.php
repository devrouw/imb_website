<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Permohonan IMB</font></center>
		<hr>
		<a href="index.php?page=tambah_imb"><button class="btn btn-dark right">Permohonan IMB +</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No KTP</th>
					<th>Nama Lengkap.</th>
					<th>Provinsi</th>
					<th>Alamat</th>
					<th>No HP</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_profil ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['no_ktp'].'</td>
							<td>'.$data['nama_lengkap'].'</td>
							<td>'.$data['provinsi'].'</td>
							<td>'.$data['alamat'].'</td>
							<td>'.$data['no_hp'].'</td>
							<td>
								<a href="index.php?page=edit&no_ktp='.$data['no_ktp'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=delete&no_ktp='.$data['no_ktp'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
