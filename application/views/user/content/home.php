<!--<div class="alert alert-info" role="alert">
  WRB Online Menerima Pesanan dari jam <b>09:00 - 21:00 WIB</b> . Pesanan diluar jam tersebut akan di proses esok hari . untuk menu catering mungkin akan diganti dengan menu catering hari selanjutnya
</div>-->
<div class="alert alert-info" role="alert">
Selamat Datang di Website WRB Online ,  Kami membantu segala kebutuhan pelanggan yang berhubungan dengan layanan catering , mulai catering harian sampai acara-acara penting lainnya
<br><br>
<b>Ketentuan Untuk Catering Harian:</b><br>
<b>Batas Pemesanan Jam 9 Pagi di hari tersebut<br>Pesanan Diantar mulai dari jam 11:30</b>
<p>Jika Pesan Diatas Jam 9 Pagi maka hanya bisa memilih menu bertanda ready stock<br>

Untuk Daerah Antapani dan Arcamanik Gratis Ongkir . Untuk Daerah Lain Menggunakan Gosend</div>
<div class="alert alert-success" role="alert">
<b>Promo</b> Setiap Pembelian Menggunakan Situs WRB Online akan mendapatkan salah satu reward berikut : Kerupuk 1 Toros , Aneka Snack atau Sambal Dadak . <br>Ketentuan : Promo Berlaku Selama Barang Tersedia
</div>
<div class="d-none-md alert alert-warning" role="alert">
<b>Geser Ke kanan untuk melihat semua kategori</b>
</div>

<div class="row katimglist">
   <?php echo $katimglist ?>

 </div>



  <hr>
  <div class="form-group d-none">
   <label for="exampleFormControlSelect1">Pilih Kategori / Hari</label>
   <select class="form-control" onchange="changekat()" id="katlist">
    <?= $katlist ?>
   </select>
 </div>
  <hr>
      <br>
  <div class="">

    <center>
    <button type="button"  data-toggle="modal" data-target="#lacakModal" class="btn btn-sm pa5 btn-primary">Lacak Pesanan</button>
    <a href="https://instagram.com/wrb_catering"><button type="button" class="btn btn-sm pa5 btn-secondary">Instagram</button></a>
    <a href="https://wa.me/6281398741770?text=Assalamualaikum"><button type="button" class="btn pa5 btn-sm btn-success">WA Admin</button></a>
    <button type="button" class="pa5 btn btn-sm btn-info" data-toggle="modal" data-target="#testiModal">
      Testimoni
    </button>
</center>
  </div>
  <hr>

<?php echo $content?>

<script>
function changekat() {
  var e = document.getElementById("katlist");
var strUser = e.options[e.selectedIndex].value;
window.location.replace("/kategori/" + strUser);
}

function pesbarclick(id) {
window.location.replace("/kategori/" + id);
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

function gotoorder() {
  window.location.replace("/user/payment/" + document.getElementById("orderinput").value);
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

<div class="modal fade" id="lacakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="lacakModalLabel">Lacak Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <p>Masukan Nomor Order (WRB-xxxx)</p>
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">WRB-</span>
  </div>
  <input type="number" id="orderinput" class="form-control" placeholder="1234" >
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="gotoorder()" class="btn btn-primary">Cek Status Pesanan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="testiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="testiModalTitle">Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <?= $testi ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
