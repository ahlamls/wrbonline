<h2>Pemesanan Selesai!</h2>
<p>Status:<?php if ($paid == 0) { ?><span class='badge badge-danger'>Belum Dibayar</span> <?php } else { ?> <span class='badge badge-success'>Sudah Dibayar</span> '' <?php } ?> <br>Waktu Pemesanan:<?= $waktu ?></p>
<p>KODE ORDER ANDA : <b><span id="ordernum">WRB-<?=$aidi?></span></b> <br>Silahkan simpan kode order untuk melihat order ini<br>
  <?php
  if ($method == 0) {
    ?>
    Silahkan transfer dengan nominal sebesar <b>Rp <span id="jumlah"><?= $total ?></span></b> ke salah satu rekening dibawah<br>Batas waktu transfer adalah hari besok dari pembuatan order jam 9 <br>Untuk mempermudah verifikasi pembayaran bisa disebutkan <b>KODE ORDER</b> di Pesan/Keterangan saat melakukan transfer</p>
<?php } else { ?>
  <p>Silahkan siapkan uang tunai dengan nominal <b>Rp <span id="jumlah"><?= $total?></span></b> saat makanan sampai di tujuan</p>

<?php } ?>
<hr>
<div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">BANK BCA</h5>
    <h6 class="card-subtitle mb-2"><b>A/N RANI FITRIANI</h6>
    <p class="card-text">No Rek : 8090358333</p>
  </div>
</div>
<hr>
<h4>Detail Order</h4>
<p>Nama: <b id="nama"><?= $nama?></b><br>
<p>Nomor HP : <b id="nohp"><?= $nohp?></b><br>
<p>Alamat: <b id="alamat"></b><?= $alamat ?></p>
<h5>Menu yang di order</h5>

<?= $content ?>
<p>Info/Keterangan:<br><span id="keterangan"><?= $info ?></span></p>
<p>Total:</p>
<h3>Rp <?= $total?></h3>
<hr>
<p>Jika ada masalah bisa hubungi no WA berikut : <b>081398741770</b></p>
