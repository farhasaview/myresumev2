<div class="col-md-12">
  
  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  
  <a href="<?=base_url()?>admin/addEducation" type="button" class="btn btn-info" rel="tooltip" title="add education"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">Number</th>
        <th scope="col">Year start education</th>
        <th scope="col">Year graduation</th>
        <th scope="col">Level education</th>
        <th scope="col">Degree</th>
        <th scope="col">Major</th>
        <th scope="col">Where do you study?</th>
        <th scope="col">Education description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $education) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$education['tahun_masuk']?></td>
        <td><?=$education['tahun_lulus']?></td>
        <td><?=$education['tingkat_education']?></td>
        <td><?=$education['degree']?></td>
        <td><?=$education['jurusan']?></td>
        <td><?=$education['nama_instansi']?></td>
        <td><?=$education['informasi_education']?></td>
        <td>
          <a href="<?= base_url()?>admin/editEducation/<?=$education['id_education'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>admin/deleteEducation/<?=$education['id_education']?>" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>