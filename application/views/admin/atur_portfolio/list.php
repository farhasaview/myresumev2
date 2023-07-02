<div class="col-md-12">
  
  <!-- notifikasi -->
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <!-- end of notifikasi -->
  <a href="<?=base_url()?>admin/addPortfolio" type="button" class="btn btn-info" rel="tooltip" title="add portfolio"><i class="fa fa-plus"></i></a>

  <?php if (empty($all)) {echo null;} else {?>
  <table class="table table-bordered table-striped table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">Number</th>
        <th scope="col">Capture</th>
        <th scope="col">Project Name</th>
        <th scope="col">URL to Your Project</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $portfolio) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$portfolio['capture']?></td>
        <td><?=$portfolio['nama_portfolio']?></td>
        <td><?=$portfolio['url_portfolio']?></td>
        <td>
           <button type="button" onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$portfolio['capture']?>");' rel="tooltip" title="view image" class="btn btn-outline-dark btn-sm"><i class="fa fa-eye"></i></button>
        </td>
        
        <td>
          <a href="<?= base_url()?>admin/editPortfolio/<?=$portfolio['id_portfolio'] ?>" type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>admin/deletePortfolio/<?=$portfolio['id_portfolio']?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
        <td>
            <?php if ($portfolio['status'] == 1) {?>
          <a href="<?= base_url()?>admin/setStatus/0/<?=$portfolio['id_portfolio'] ?>" rel="tooltip" title="nonaktifkan" type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
          <?php }else { ?>
          <a href="<?= base_url()?>admin/setStatus/1/<?=$portfolio['id_portfolio'] ?>" type="button" rel="tooltip" title="aktifkan" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
          <?php } ?>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>

<!-- Modal View Img -->
<div class="modal fade" id="viewImg">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img id="image-preview" style="width: 100%; height: 100%" alt="view image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
// preview di tag img
    function previewImage(nilai) {
      $("#viewImg").modal();
      $("#image-preview").attr('src', nilai);
       // document.getElementById("image-preview").src = nilai;
    }
</script>