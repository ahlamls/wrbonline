<div class="container"><h1>Edit Menu #<?= $id ?></h1>
<hr>

<form enctype="multipart/form-data" action="/AdminWRBOnline/handleEditMenu/<?=$id?>" method="POST">

<div class="form-group">
    <label for="kategori">Kategori Menu</label>
    <select class="form-control" id="kategori" required="" name="kategori">
      <?= $katlist ?>
    </select>
  </div>

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" value="<?= $nama ?>" required="" id="nama" placeholder="Ayam Bakar">
</div>

<div class="form-group">
<label for="harga">Harga</label>
<input type="text" class="form-control" name="harga" value="<?= $harga ?>" required="" id="harga" placeholder="55000">
</div>

<div class="form-group">
<label for="minorder">Minimal Order</label>
<input type="number" class="form-control" name="minorder" required="" id="minorder" value="1" placeholder="1">
</div>


<div class="form-group">
    <label for="open">Menu Aktif</label>
    <select class="form-control" id="open" required="" name="open">
       <option selected value="1">Ya</option>
       <option value="0">Tidak</option>
    </select>
  </div>

<button class="btn btn-success w-100" type="submit">Edit Menu</button>

</form>
</div>
