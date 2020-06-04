<div class="alert alert-info" role="alert">
  WRB Online Menerima Pesanan dari jam <b>09:00 - 20:00 WIB</b>
</div>

  <div class="form-group">
   <label for="exampleFormControlSelect1">Pilih Kategori</label>
   <select class="form-control" onchange="changekat()" id="katlist">
    <?= $katlist ?>
   </select>
 </div>
  <hr>

<?php echo $content?>

<script>
function changekat() {
  var e = document.getElementById("katlist");
var strUser = e.options[e.selectedIndex].value;
window.location.replace("/kategori/" + strUser);
}

function goToCart() {
  window.location.replace("/keranjang");
}

function addCart(id) {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "gagalc") {
          alert("Gagal menambah ke keranjang . pastikan Cookie sudah diaktifkan");
        } else if (this.responseText == "gagal") {
          alert("Gagal menambah ke keranjang . Kesalahan Server");
        } else if (this.responseText == "sukses") {
          document.getElementById("namabarang").innerHTML = "<b>" + document.getElementById("peloduk-" + id).innerHTML + "</b>";
          $('#exampleModalCenter').modal('show');
        }
      }
    };
    xmlhttp.open("GET", "/user/addtocart/" + id, true);
    xmlhttp.send();
}
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle">Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="namabarang"></p> Telah ditambahkan ke keranjang
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        <button type="button" onclick="goToCart()" class="btn btn-primary">Lihat Keranjang</button>
      </div>
    </div>
  </div>
</div>
