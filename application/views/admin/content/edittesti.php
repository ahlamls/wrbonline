<div class="container"><h1>Edit Testimoni #<?= $id ?></h1>
<hr>

<form enctype="multipart/form-data" action="/AdminWRBOnline/handleEditTesti/<?=$id?>" method="POST">

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" value="<?= $nama ?>" required="" id="nama" placeholder="Ayam Bakar">
</div>

<div class="form-group">
<label for="minorder">Rating</label>
<input type="number" value="<?= $rating?>" class="form-control" name="rating" required="" id="minorder" min="1" max="5" value="5" placeholder="1-5">
</div>

<div class="form-group">
  <label for="testi">Testimoni : </label>
  <textarea class="form-control" name="testi" id="testi" rows="3"><?= $testi ?></textarea>
</div>


<button class="btn btn-success w-100" type="submit">Edit Testi</button>

</form>
</div>
