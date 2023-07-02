<div class="col-md-12">
  
  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  
  <a href="<?=base_url()?>admin/addWorkExperience" type="button" class="btn btn-info" rel="tooltip" title="add work experience"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-responsive bg-light">
    
  </style>
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">Number</th>
        <th scope="col">Work Start Date</th>
        <th scope="col">Work End Date</th>
        <th scope="col">Company Name</th>
        <th scope="col">Position</th>
        <th scope="col">Job Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $workExperience) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$workExperience['tgl_awal_kerja']?></td>
        <td><?=$workExperience['tgl_akhir_kerja']?></td>
        <td><?=$workExperience['nama_perusahaan']?></td>
        <td><?=$workExperience['jabatan']?></td>
        <td><?=$workExperience['informasi_pekerjaan']?></td>
        <td>
          <a href="<?= base_url()?>admin/editWorkExperience/<?=$workExperience['id_work_experience'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>admin/deleteWorkExperience/<?=$workExperience['id_work_experience']?>" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>