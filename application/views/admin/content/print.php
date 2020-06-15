<head>
  <title>Print Order WRB Online (Tekan CTRL + P . Ukuran kertas A5 Landscape atau A4 Portrait)</title>
  <style>
  table, th, td {
  border: 1px solid black;
}</style>
</head>
<body>
  <div style="width:100% ;float:right">

<img style="float:left" src="/logo.jpeg" width="200px">

    <h3 style="margin-left:250px" >WRB ONLINE<br><b>https://online.wrbcatering.id</b><br>No WA Admin : 081398741770</h3> </div>

<div style="width:50%;float:left; ">
  <p>Order No. <b>WRB-<?= $aidi ?></b></p>
  <p>Nama: <b><?= $nama ?></b></p>
  <p>Nomor HP: <b><?= $nohp ?></b></p>
  <p>Status : <b><?php if ($paid == 0) { echo "Belum Dibayar / COD";} else { echo "Dibayar Lunas";}  ?></b></p>
</div>
<div style="width:50%;float:left; ">
  <p>Waktu : <?= $waktu ?></p>
  <p>Alamat: <?= $alamat ?></p>
  <p>Info / Keterangan : <?= $info ?></p>

</div>

  <table style="width:100%">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>

      </tr>
    </thead>
    <tbody>

        <?= $content ?>
    </tbody>
  </table>


  <p style="float:right">Subtotal : <b>Rp <?= $totalprice ?></b>
  <br>Metode Pembayaran : <b><?php if ($method == 0) { echo "Transfer";} else { echo "COD";}  ?></b></p>
</body>
