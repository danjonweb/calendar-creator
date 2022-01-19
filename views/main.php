<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendar Creator</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/style.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/htmx/1.6.1/htmx.min.js" integrity="sha512-aUGLiEPPd4KYAKmXba1ZeH3JCtPEo3F8Ay1C7sRpSnOcfsczlP1j14jo3abBaMqJu9QC4pbh8TyKy9ekZ6j7Pw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <section class="hero is-link">
    <div class="hero-body">
      <p class="title">
        Calendar Creator
      </p>
      <p class="subtitle">
        Add events to the staff calendar
      </p>
    </div>
  </section>
  <?php require($view); ?>
</body>
</html>