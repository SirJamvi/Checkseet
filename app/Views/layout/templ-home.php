<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/v4-font-face.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/v4-font-face.min.css" rel="stylesheet">

  </head>
  <body>
    
    <?= $this->renderSection('content'); ?>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <!-- <footer>
      <div class="copyrights">

        <p>Environment: <?= ENVIRONMENT ?> - CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> | Page rendered in {elapsed_time} seconds</p>

        <p>&copy; <?= date('Y') ?> MIS - PT. Sharp Semiconductor Indonesia.</p>

      </div>
    </footer> -->

    <!-- <script src="<?=base_url()?>assets/js/jquery-3.7.1.min.js"></script> -->
    <!-- <script src="assets/js/jquery-3.7.1.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>