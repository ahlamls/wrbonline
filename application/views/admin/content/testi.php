<div class="container"><h1>Testimoni</h1>
<hr>
<form enctype="multipart/form-data" action="/AdminWRBOnline/handleAddTesti/" method="POST">

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" required="" id="nama" placeholder="Mas Agus">
</div>

<div class="form-group">
<label for="minorder">Rating</label>
<input type="number" class="form-control" name="rating" required="" id="minorder" min="1" max="5" value="5" placeholder="1-5">
</div>

<div class="form-group">
  <label for="testi">Testimoni : </label>
  <textarea class="form-control" name="testi" id="testi" rows="3"></textarea>
</div>


<button class="btn btn-success w-100" type="submit">Tambah Testi</button>

</form>
<hr>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Waktu</th>
      <th>Nama</th>
      <th>Testi</th>
      <th>Rating</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?= $content?>

  </tbody>
</table>
</div>
</div>
