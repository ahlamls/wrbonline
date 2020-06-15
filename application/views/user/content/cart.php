<div id="cart">
<h2>Keranjang</h2>
<div class="row" id="ajax">
Loading...
</div>
<hr>
<p>Info / Keterangan</p>
  <textarea rows="4" class="w-100" id="info"></textarea>
  <hr>
  <p>Total:</p>
  <h2>Rp <span id="totalprice">0</span></h2>
  <button class="btn btn-success  w-100" id="detailbtn" onclick="gotodetail()">Pesan</button>
  <br>
</div>

<div id="detail" style="display:none">
  <h2>Info Pemesan</h1>
              <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" placeholder="">
          </div>
          <div class="form-group">
        <label for="nohp">Nomor Handphone (08xxxxxx) </clabel>
        <input type="tel" maxlength="14" minlength="11" class="form-control" id="nohp" placeholder="">
      </div>
      <div class="form-group">
    <label for="alamat">Alamat Lengkap</label>
    <textarea rows="3" type="text" class="form-control" id="alamat" placeholder=""></textarea>
  </div>
  <label>Metode Pembayaran</label>
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" checked> Transfer
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2"> COD
  </label>

</div>
<hr>
  <button class="btn btn-success w-100" onclick="ajax5()">Pesan Sekarang</button>
  <p class="text-muted">Dengan memesan kamu menyetujui syarat dan ketentuan WRB Online</p>
  <br>
</div>


<script>
//document.getElementById("detailbtn").style.display = "none";
function gotodetail() {
  document.getElementById("cart").style.display = "none";
  document.getElementById("detail").style.display = "block";
  window.scrollTo(0,0);
}
window.onload = function(){ajax();
document.getElementById("detailbtn").style.display = "none";};

function ajax() {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ajax").innerHTML = this.responseText;
        ajax4();
      } else if (this.readyState == 4) {
        alert("Gagal Mendapatkan daftar keranjang. Pastikan anda terkoneksi internet");
      }
    };
    xmlhttp.open("GET", "/user/cartlist/" , true);
    xmlhttp.send();
}

function changenum(id) {
  if (parseInt(document.getElementById("quantity-" + id).value) == 0) {
    document.getElementById("quantity-" + id).value = 1;
  }
  if (parseInt(document.getElementById("quantity-" + id).value ) > 1000) {
    document.getElementById("quantity-" + id).value = 1000;
  }
  if (parseInt(document.getElementById("quantity-" + id).value) <= parseInt(document.getElementById("quantity-" + id).min)){
    document.getElementById("quantity-" + id).value = parseInt(document.getElementById("quantity-" + id).min);
  }

  ajax2(id);
}

function dec(id) {
if (parseInt(document.getElementById("quantity-" + id).value) !== 1 && parseInt(document.getElementById("quantity-" + id).value) > parseInt(document.getElementById("quantity-" + id).min) ) {
  document.getElementById("quantity-" + id).value = parseInt(document.getElementById("quantity-" + id).value) - 1;
      ajax2(id);
  }
}

function inc(id) {
  if (parseInt(document.getElementById("quantity-" + id).value ) !==   1000) {
    document.getElementById("quantity-" + id).value = parseInt(document.getElementById("quantity-" + id).value) + 1;
      ajax2(id);
  }
}

function hapus(id) {
document.getElementById("delid").value = id;
document.getElementById("itemname").innerHTML = document.getElementById("menuname-" + id).innerHTML;
$('#exampleModalCenter').modal('show');
}

function ajax2(id) {
  var value = document.getElementById("quantity-" + id).value;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "gagal" ) {
          alert("Gagal Mengubah jumlah . kesalahan server");
        }else {
          ajax();
        }
      } else  if (this.readyState == 4) {
        alert("Gagal Mengubah jumlah . Pastikan anda terkoneksi internet");
      }
    };
    xmlhttp.open("GET", "/user/updatecart/" + id + "?v=" + value , true);
    xmlhttp.send();
}

function ajax3() {
  $('#exampleModalCenter').modal('hide');
  var id = document.getElementById("delid").value;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "gagal" ) {
          alert("Gagal Menghapus  . kesalahan server");
        }else {
          ajax();
        }
      } else   if (this.readyState == 4) {
        alert("Gagal Menghapus. Pastikan anda terkoneksi internet");
      }
    };
    xmlhttp.open("GET", "/user/deletecart/" + id , true);
    xmlhttp.send();
}

function ajax4() {

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

            document.getElementById("totalprice").innerHTML = this.responseText;
            if (this.responseText == "0") {
              document.getElementById("detailbtn").style.display = "none";
            } else {
              document.getElementById("detailbtn").style.display = "block";
            }


      } else   if (this.readyState == 4) {
        alert("Gagal Mendapatkan jumlah. Pastikan anda terkoneksi internet");
      }
    };
    xmlhttp.open("GET", "/user/totalcart/"  , true);
    xmlhttp.send();
}

function ajax5() {
  var metode = 0;
  if (document.getElementById("nama").value == "" || document.getElementById("alamat").value == "" || document.getElementById("nohp").value == "") {
    alert("Data masih ada yang belum di isi");
    return;
  }
  if (!document.getElementById("nohp").value.startsWith("08")){
    alert("Nomor HP harus diawali dengan 08 . +62 diganti jadi 0");
    return;
  }
  if (document.getElementById("nohp").value.length < 11) {
    alert("Nomor HP tidak valid , terlalu pendek");
    return;
  }
  if ( document.getElementById("option1").checked) {
    metode = 0;
  } else if ( document.getElementById("option2").checked ) {
    metode=1;
  }
  $('#loading').modal('show');

  var info = document.getElementById("info").value;
  var nama = document.getElementById("nama").value;
  var alamat = document.getElementById("alamat").value;
  var nohp = document.getElementById("nohp").value;

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        if (this.responseText == "gagal" ) {
          alert("Gagal melakukan pesanan . kesalahan server");
        }else {
            window.location.replace("/user/payment/" + this.responseText);
        }


      } else if (this.readyState == 4) {
        alert("Gagal melakukan pesanan. Pastikan anda terkoneksi internet");
      }
    };
    xmlhttp.open("POST", "/user/submitcart/"  , true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("info=" + info + "&nama=" + nama + "&nohp=" + nohp + "&alamat=" + alamat + "&metode=" + metode);


}


</script>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah kamu yakin akan menghapus <b id="itemname"></b></p>
        <input type="hidden" id="delid" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="ajax3()" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="loading" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <center>
        <div class="lds-facebook"><div></div><div></div><div></div></div>
        <p>Loading...</p>
      </center>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
