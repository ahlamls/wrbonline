<div class="container"><h1>Tambah Menu</h1>
<hr>

<form enctype="multipart/form-data" action="/AdminWRBOnline/handleAddMenu" method="POST">

<div class="form-group">
    <label for="kategori">Kategori Menu</label>
    <select class="form-control" id="kategori" required="" name="kategori">
      <?= $katlist?>
    </select>
  </div>

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" required="" id="nama" placeholder="Ayam Bakar">
</div>

<div class="form-group">
<label for="harga">Harga</label>
<input type="text" class="form-control" name="harga" required="" id="harga" placeholder="55000">
</div>

<div class="form-group">
   <label for="gambar">Gambar</label>
   <input type="file" class="form-control-file" required="" id="gambar" name="gambar">
 </div>

<button class="btn btn-success w-100" type="submit">Buat Menu</button>

</form>
</div>
