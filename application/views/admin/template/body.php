<!DOCTYPE html>
<html lang="en">
  <!-- load header and sekaligus menu navigasi navbar -->
  <?php $this->load->view('admin/template/header'); ?>
  <!-- end of load header and sekaligus menu navigasi navbar -->

    <!-- warna Silver -->
<div style="background-color: #C0C0C0;"><br>
    <!-- Page Content -->
    <div class="container">
        <?php $this->load->view($content);?>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>
    <!-- end of Page Content -->

    <!-- load footer -->
    <?php $this->load->view('admin/template/footer'); ?>
</html>
