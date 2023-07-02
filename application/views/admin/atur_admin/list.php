  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  
  <a href="<?=base_url()?>admin/add" type="button" class="btn btn-info" rel="tooltip" title="add admin"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($all as $user) { ?>
      <tr>
        <td><?=$user->id_admin?></td>
        <td><?=$user->username?></td>
        <td>
          <a href="<?= base_url()?>admin/edit/<?=$user->id_admin ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a href="<?= base_url()?>admin/delete/<?=$user->id_admin?>" onclick="return confirm('apakah anda yakin?')" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>