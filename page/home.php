<div class="container">
	<h3>Cari Kost</h3><h5>sesuai kriteriamu^^</h5>
	<!-- search -->
	<div class="row">
		<form action="<?=$_SERVER["REQUEST_URI"]?>">
				<input type="hidden" name="searched" value="true">
				<div class="col-md-4">
					<label for="status" class="control-label">Kost Untuk</label>
					<select class="form-control" name="status" id="status">
						<option>---</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
						<option value="Campur">Campur</option>
					</select>
				</div>
				<div class=" ">
					<label for="">Rentang Harga</label>
					<div class="input-group">
						<span class="input-group-addon" style="border-right: 0;">Min</span>
						<input type="number" name="min" id="min" class="form-control" value="0">
						<span class="input-group-addon" style="border-left: 0; border-right: 0;">Max</span>
						<input type="number" name="max" id="max" class="form-control" value="0">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary" id="submit">Cari...</button>
						</span>
					</div>
				</div>
		</form>
	</div>
<<hr>
<div class="panel panel-info">
		        <div class="panel-heading"><h3 class="text-center">DAFTAR PENAWARAN KOST</h3></div>
		        <div class="panel-body">
		            <table class="table table-condensed">
		                <thead>
		                    <tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Harga/6 Bulan</th>
							<th>Harga Pertahun</th>
							<th>Kost Untuk</th>
							<th>Kamar Tersedia</th>
							<th>Alamat</th>
							<th>Fasilitas</th>
							<th>Kontak (No. HP)</th>
							<th>Gambar</th>
							<th></th>
		                    </tr>
		                </thead>
				<tbody>
					<?php
					if (isset($_GET["searched"])) {
						if ($_GET["searched"] == "click") {
							$query = $connection->query("SELECT * FROM kost a WHERE id_kost=$_GET[key]");
						} else {
							$query = $connection->query("SELECT * FROM kost a WHERE status='$_GET[status]' AND (a.`harga_pertahun` BETWEEN $_GET[min] AND $_GET[max])");
						}
					} else {
						$query = $connection->query("SELECT * FROM kost ORDER BY harga_3bulan, harga_6bulan, harga_pertahun");
					}
					$no = 1;
					?>
					<?php while ($row = $query->fetch_assoc()): ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$row["nama"]?></td>
							<td>Rp.<?=$row["harga_6bulan"]?>,-</td>
							<td>Rp.<?=$row["harga_pertahun"]?>,-</td>
							<td><span class="label label-<?=($row["status"] == "Perempuan") ? "info" : "primary"?>"><?=$row["status"]?></span></td>
							<td><?=$row["tersedia"]?></td>
							<td><?=$row["alamat"]?></td>
							<td><?=$row["fasilitas"]?></td>
							<td><?=$row["kontak"]?></td>
							<td><a href="assets/img/kost/<?=$row['file']?>" class="btn btn-info btn-xs fancybox">Lihat</a></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
