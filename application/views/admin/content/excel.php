<html>
<head>
	<title>Export Data Pelanggan WRB Online</title>
</head>
<body>
  <style type="text/css">
  	body{
  		font-family: sans-serif;
  	}
  	table{
  		margin: 20px auto;
  		border-collapse: collapse;
  	}
  	table th,
  	table td{
  		border: 1px solid #3c3c3c;
  		padding: 3px 8px;

  	}
  	a{
  		background: blue;
  		color: #fff;
  		padding: 8px 10px;
  		text-decoration: none;
  		border-radius: 2px;
  	}
  	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pelanggan $curtime.xls");
	?>

	<center>
		<h1>Export Data Pelanggan WRB Online - <?= $title ?></h1>
	</center>

	<table border="1">
		<tr>
			<th>ID Order</th>
			<th>Waktu</th>
			<th>Nama</th>
			<th>Alamat</th>
      <th>Keterangan</th>
      <th>Total</th>
      <th>Metode</th>
      <th>Menu yang dipesan</th>
		</tr>

		<?= $content ?>
	</table>
</body>
</html>
