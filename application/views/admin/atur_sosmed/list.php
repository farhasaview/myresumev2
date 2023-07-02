<div class="col-md-12">
  
  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  
  <a href="<?=base_url()?>admin/addSosmed" type="button" class="btn btn-info" rel="tooltip" title="add SocMed"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-striped table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">Number</th>
        <th scope="col">URL</th>
        <th scope="col">Name</th>
        <th scope="col">Logo</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $sosmed) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$sosmed['url_sosmed']?></td>
        <td><?=$sosmed['nama_sosmed']?></td>
        <td><?=$sosmed['icon_sosmed']?></td>
        <td>
          <a href="<?= base_url()?>admin/editSosmed/<?=$sosmed['id_sosmed'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>admin/deleteSosmed/<?=$sosmed['id_sosmed']?>" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>