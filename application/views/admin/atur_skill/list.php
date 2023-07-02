<div class="col-md-12">
  
  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  
  <a href="<?=base_url()?>admin/addSkill" type="button" class="btn btn-info" rel="tooltip" title="add skill"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-striped table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">Number</th>
        <th scope="col">Skill</th>
        <th scope="col">Percent</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $skill) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$skill['nama_skill']?></td>
        <td><?=$skill['persen_skill']?>%</td>
        <td>
          <a href="<?= base_url()?>admin/editSkill/<?=$skill['id_skill'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>admin/deleteSkill/<?=$skill['id_skill']?>" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>