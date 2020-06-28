
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://kit.fontawesome.com/eeadae3b36.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="/assets/css/style.css">

    <title>WRB Online</title>
  </head>
  <body>
<?php
$dnone = "";
if (strpos($_SERVER['HTTP_USER_AGENT'], 'WRBAPK/')) {
  $dnone = "d-none";
}
?>
    <nav class="navbar sticky-top navbar-dark bg-dark text-white <?=$dnone?>">
  <a class="navbar-brand" href="/">WRB Online</a>


    <form class="form-inline my-2 my-lg-0">

    <a href="/keranjang/">  <button class="btn btn-sm btn-success my-2 my-sm-0" type="button">Keranjang</button></a>
    </form>

</nav>
<br>
<div class="container">
