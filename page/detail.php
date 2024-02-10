<div id="map" style="width:100%; height:500px"></div>
	<hr>
	<!-- /search -->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<?php $query = $connection->query("SELECT a.nama, b.nama AS pemilik, a.alamat, a.tersedia, a.status, a.harga_6bulan, a.harga_pertahun, a.fasilitas, a.kontak FROM kost a JOIN pemilik b USING(id_pemilik) WHERE id_kost=$_GET[key]"); while ($row = $query->fetch_assoc()): ?>
					<tr>
						<th>Nama Kost</th>
						<td>: <?=$row["nama"]?></td>
					</tr>
					<tr>
						<th>Pemilik</th>
						<td>: <?=$row["pemilik"]?></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>: <?=$row["alamat"]?></td>
					</tr>
					<tr>
						<th>Kamar Tersedia</th>
						<td>: <?=$row["tersedia"]?></td>
					</tr>
					<tr>
						<th>Kost Untuk</th>
						<td>: <?=$row["status"]?></td>
					</tr>
					<tr>
						<th>Harga per 6 bulan</th>
						<td>: <?=$row["harga_6bulan"]?></td>
					</tr>
					<tr>
						<th>Harga pertahun</th>
						<td>: <?=$row["harga_pertahun"]?></td>
					</tr>
					<tr>
						<th>Fasilitas</th>
						<td>: <?=$row["fasilitas"]?></td>
					</tr>
						<th>Kontak (No.HP)</th>
						<td>: <?=$row["kontak"]?></td>
					</tr>
					<tr>
						<th>Gambar</th>
						<td>: <?=$row["file"]?></td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</div>

	<div class="row">
		<?php $query = $connection->query("SELECT judul, file FROM galeri WHERE id_kost=$_GET[key]"); while ($row = @$query->fetch_assoc()): ?>
			<div class="col-xs-6 col-md-3">
		    <a href="assets/img/kost/<?=$row['file']?>" class="thumbnail fancybox">
		      <img src="assets/img/kost/<?=$row['file']?>" alt="<?=$row['judul']?>">
		    </a>
		  </div>
		<?php endwhile; ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".fancybox").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		iframe : {
			preload: false
		}
	});
	$(".various").fancybox({
		maxWidth    : 800,
		maxHeight    : 600,
		fitToView    : false,
		width        : '70%',
		height        : '70%',
		autoSize    : false,
		closeClick    : false,
		openEffect    : 'none',
		closeEffect    : 'none'
	});
	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
});
</script>
