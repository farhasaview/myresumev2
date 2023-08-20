<div class="col-md-12">
<?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>

  <table class="table table-bordered table-striped table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <!-- <th scope="col">No.</th> -->
        <th scope="col">ID</th>
        <th scope="col">Maintenance Message</th>
        <th scope="col">Maintenance Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $maintenance_mode) { ?>
      <tr>
        <!-- <td><?=$no++?></td> -->
        <td><?=$maintenance_mode['id_maintenance_mode']?></td>
        <td><div id="maintenance_message" contentEditable="true"><?=$maintenance_mode['maintenance_message']?></div><a href="<?= base_url()?>admin/setMessageMaintenanceMode/<?=encrypt_url($_COOKIE['Message'])?>/<?=$maintenance_mode['id_maintenance_mode'] ?>" type="button" rel="tooltip" title="Set Maintenance Message & you should click 2x"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></td>
        <td>
            <?php if ($maintenance_mode['status'] == 1) {?>
          Maintenance Mode, is On <a href="<?= base_url()?>admin/setStatusMaintenanceMode/0/<?=$maintenance_mode['id_maintenance_mode'] ?>" rel="tooltip" title="nonaktifkan" type="button"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
          <?php }else { ?>
          Maintenance Mode, is Off <a href="<?= base_url()?>admin/setStatusMaintenanceMode/1/<?=$maintenance_mode['id_maintenance_mode'] ?>" type="button" rel="tooltip" title="aktifkan"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
          <?php } ?>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>
<script>
var myEditableElement = document.getElementById('maintenance_message');
myEditableElement.addEventListener('input', function() {
    //console.log('An edit input has been detected');
    var message = myEditableElement.innerHTML;
	//console.log(message);
	//document.cookie = "nama_cookie_nya="+value_cookie_nya;
	document.cookie = "Message="+message;
});
</script>