<?php 
$session = $this->session->userdata('nama');
error_reporting(0);
ini_set('display_errors', 0);
?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--title>Hello, world!</title -->
  <title><?php echo $title ?></title>

  <!-- style css -->
  <style>
    .badge {
      margin-left: 3px;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class='container'>
      <a class="navbar-brand" href="#">Perpajakan Client</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
        <?php
          if ($session) {
        ?>
            <a class="nav-item nav-link" href="<?= base_url(); ?>pajak">Data Objek Pajak</a>
            <a class="nav-item nav-link" href="<?= base_url(); ?>wajibpajak/indexwajibpajak">Data Wajib Pajak</a>
            <a class="nav-item nav-link" href="<?= base_url(); ?>petugaspajak">Data petugas Pajak</a>
            <a class="nav-item nav-link" href="<?= base_url(); ?>login_control/logout">LogOut</a>
        <?php
          } else {
        ?>
            <a class="nav-item nav-link" href="<?= base_url(); ?>login_control/index">Login</a>
          <?php } ?>
          <a class="nav-item nav-link" href="<?= base_url(); ?>about">About</a>
          <!--a class="nav-item nav-link disabled" href="#">Disabled</a-->
        </div>
      </div>
  </nav>