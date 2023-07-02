<div class="col-md-12">
  
  <!-- notifikasi tambah data -->
  <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>

  <table class="table table-bordered table-responsive bg-light">
    <tbody>
      <tr>
        <th>Logo</th>
        <td><?=$isi['logo']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/logo/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <!-- Button trigger modal -->
          <button onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$isi['logo']?>","logo");' rel="tooltip" title="view" type="button" class="btn btn-outline-danger">
            <i class="fa fa-eye"></i>
          </button>
        </td>
      </tr>
      <tr>
        <th>Image Background Paralax</th>
        <td><?=$isi['img_bg_paralax']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/img_bg_paralax/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-danger" onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$isi['img_bg_paralax']?>","img_bg_paralax");' rel="tooltip" title="view">
            <i class="fa fa-eye"></i>
          </button>
        </td>
      </tr>
      <tr>
        <th>Profile Picture</th>
        <td><?=$isi['foto_profil']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/foto_profil/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-danger" onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$isi['foto_profil']?>","foto_profil");' rel="tooltip" title="view">
            <i class="fa fa-eye"></i>
          </button>
        </td>
      </tr>
      <tr>
        <th>Profile Name</th>
        <td><?=$isi['nama']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/nama/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Profession</th>
        <td><?=$isi['profesi']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/profesi/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>File CV</th>
        <td><?=$isi['file_cv']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/file_cv/<?=$isi['id_content'] ?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <button onclick='previewImage("<?=base_url()?>penyimpanan_file/documents/<?=$isi['file_cv']?>","cv");' rel="tooltip" title="view" type="button" class="btn btn-outline-danger">
            <i class="fa fa-eye"></i></button>
        </td>
      </tr>
      <tr>
        <th>About</th>
        <td><?=$isi['about']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/about/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Tangal Lahir</th>
        <td><?=$isi['bi_tgl_lahir']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_tgl_lahir/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?=$isi['bi_email']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_email/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
            <?php
            $explode = explode("_", $isi['bi_email']);
            if ($explode[1] == 'nonaktif') {
                $email=$explode[0];?>
            <a href="<?= base_url()?>admin/setAktif/bi_email/<?=$email?>/<?=$isi['id_content']?>" type="button" rel="tooltip" title="aktifkan" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
          <?php }else { ?>
          <a href="<?= base_url()?>admin/setNonaktif/bi_email/<?=$isi['bi_email']?>/nonaktif/<?=$isi['id_content']?>" rel="tooltip" title="nonaktifkan" type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><?=$isi['bi_phone']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_phone/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
            <?php
            $explode = explode("_", $isi['bi_phone']);
            if ($explode[1] == 'nonaktif') {
                $phone=$explode[0];?>
            <a href="<?= base_url()?>admin/setAktif/bi_phone/<?=$phone?>/<?=$isi['id_content']?>" type="button" rel="tooltip" title="aktifkan" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
          <?php }else { ?>
          <a href="<?= base_url()?>admin/setNonaktif/bi_phone/<?=$isi['bi_phone']?>/nonaktif/<?=$isi['id_content']?>" rel="tooltip" title="nonaktifkan" type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?=$isi['bi_address']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_address/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Address Map</th>
        <td><a href="javascript:void(0)" onclick='window.open("<?=$isi['bi_address_map']?>")'><?=$isi['bi_address_map']?></a></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_address_map/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Language</th>
        <td><?=$isi['bi_language']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/bi_language/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
      </tr>
      <tr>
        <th>Image Background Contact Form</th>
        <td><?=$isi['img_bg_contact']?></td>
        <td>
          <a href="<?= base_url()?>admin/editIsi/img_bg_contact/<?=$isi['id_content']?>" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-danger" onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$isi['img_bg_contact']?>","img_bg_contact");' rel="tooltip" title="view">
            <i class="fa fa-eye"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Modal lihat -->
<div class="modal fade" id="lihat">
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
    function previewImage(nilai,fileApa) {
      // console.log(fileApa);
      // jika cv buka file di new tab browser
      if (fileApa == 'cv') {
        $("#lihatCV").modal();
        window.open(nilai);
        // jika bukan cv maka buka di modal tujuannya untuk image
      } else {
        $("#lihat").modal();
        $("#image-preview").attr('src', nilai);
      }
    }
</script>