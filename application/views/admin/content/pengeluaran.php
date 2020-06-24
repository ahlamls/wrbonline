<div class="container"><h1>Pengeluaran</h1>
  <style>
  .opit {
    color:#009900 !important;
  }

  .opitnt {
    color:#990000 !important;
  }</style>
<hr>
<form action="/AdminWRBOnline/handleAddPengeluaran" method="POST">
<p>Hari Ini : <?= $date ?></p>
<label for="pengeluaran">Pengeluaran</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Rp</span>
  </div>
  <input type="text" name="pengeluaran" class="form-control" aria-label="Jumlah Pengeluaran">
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Keterangan</span>
  </div>
  <textarea class="form-control"  name="keterangan" aria-label="With textarea"></textarea>
</div>
<br>
<button type="submit" class="btn btn-success">Masukan/Ubah Pengeluaran</button>
</form>
<hr>
<a href="/AdminWRBOnline/excel/?y=<?=$y?>&m=<?=$m?>&d=<?=$d?>"><button type="button" class="btn btn-primary">Excel Hari ini</button></a>
<a href="/AdminWRBOnline/excel/"><button type="button" class="btn btn-info">Excel Seumur Hidup</button></a>

<hr>
<h3>Daftar Pengeluaran (<?= $m . "-" . $y?>)</h3>
<p class="text-muted">Penghasilan dari Order yang sudah lunas/dibayar</p>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tanggal</th>
      <th scope="col">Pengeluaran</th>
      <th scope="col">Penghasilan</th>
      <th scope="col">Profit</th>
      <th scope="col">Keterangan Pengeluaran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
<?= $content ?>

  </tbody>
</table>

</div>
<center>
<a href="/AdminWRBOnline/pengeluaran/?m=<?=$pm?>&y=<?=$py?>"><button type="button" class="btn btn-primary">Bulan Sebelumnya</button></a>
<a href="/AdminWRBOnline/pengeluaran/?m=<?=$nm?>&y=<?=$ny?>"><button type="button" class="btn btn-primary">Bulan Selanjutnya</button></a>
</center>
<br>
</div>
