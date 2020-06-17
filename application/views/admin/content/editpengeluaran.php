<div class="container"><h1>Edit Pengeluaran <?=$date?></h1>
<hr>
<form action="/AdminWRBOnline/handleEditPengeluaran" method="POST">
<label for="pengeluaran">Pengeluaran</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Rp</span>
  </div>
  <input type="text" value="<?=$nominal?>" name="pengeluaran" class="form-control" aria-label="Jumlah Pengeluaran">
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Keterangan</span>
  </div>
  <textarea class="form-control"  name="keterangan" aria-label="With textarea"><?=$keterangan?></textarea>
</div>
<br>
<input type="hidden" name="y" value=<?= $y?>>
<input type="hidden" name="m" value=<?= $m?>>
<input type="hidden" name="d" value=<?= $d?>>
<button type="submit" class="btn btn-success">Ubah Pengeluaran</button>
</form>
<hr>
