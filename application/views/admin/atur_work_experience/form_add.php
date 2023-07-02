<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/addWorkExperience" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <label for="tgl_awal_kerja">Work Start Date</label>
    <input type="date" name="tgl_awal_kerja" class="form-control">
  </div>
  <div class="form-group">
    <label for="tgl_akhir_kerja">Work End Date</label>
    <input type="date" name="tgl_akhir_kerja" class="form-control">
  </div>
  <div class="form-group">
    <label for="nama_perusahaan">Company Name</label>
    <input type="text" name="nama_perusahaan" maxlength="100" class="form-control" placeholder="Company Name">
  </div>
  <div class="form-group">
    <label for="jabatan">Position</label>
    <input type="text" name="jabatan" maxlength="100" class="form-control" placeholder="Your Job Position in That Company">
  </div>
  <div class="form-group">
    <label for="informasi_pekerjaan">Job Description</label>
    <textarea class="form-control" name="informasi_pekerjaan" maxlength="950" rows="3" placeholder="Job Description" required></textarea>
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>