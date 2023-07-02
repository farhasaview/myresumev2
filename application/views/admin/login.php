<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin My Resume V2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Halaman Admin My Resume V2">
  <meta name="author" content="Febi Aris Rinaldi">
  <link rel="icon" href="favicon.ico" type="image/ico">
  <link rel="stylesheet" href="<?=base_url()?>styles_publik/css/bootstrap.min.css">
  <script src="<?=base_url()?>styles_publik/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?=base_url()?>styles_publik/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>styles_publik/js/core/bootstrap.min.js"></script>
</head>
<body style="background-color: green;">
<br><br><br><br>
<div class="container bg-light col-md-3"><br>
  <h3 style="text-align: center;">My Resume V2</h3><hr>
  <form action="<?= base_url()?>login/check" method="post">
    <!-- notifikasi -->
    <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
    <!-- end of notifikasi -->
  <div class="row">
    <div class="form-group col-md-12">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12">
      <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
    </div>
  </div>

  </form>
</div><br>

<div class="container col-md-3"><br>
  <div class="row">
    <div class="form-group col-md-12">
      <footer>
        <div class="text-center" style="color: white;">
          <p>2020 My Resume V2. By Febi Aris Rinaldi. No Copyright.</p>
        </div>
      </footer>
    </div>
  </div>
</div>

<script>
  $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){ $(this).slideUp(500); });
</script>
</body>
</html>