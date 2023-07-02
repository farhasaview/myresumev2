<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/addEducation" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <label for="tahun_masuk">Year start education</label>
    <input type="text" name="tahun_masuk" maxlength="4" minlength="4" class="form-control" placeholder="type only number Year of start education" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
  </div>
  <div class="form-group">
    <label for="tahun_lulus">Year graduation</label>
    <input type="text" name="tahun_lulus" maxlength="4" minlength="4" class="form-control" placeholder="type only number Year of graduation" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
  </div>
  <div class="form-group">
    <label for="tingkat_education">Level education</label>
    <input type="text" name="tingkat_education" maxlength="30" class="form-control" placeholder="Level Education" required>
  </div>
  <div class="form-group">
    <label for="degree">Degree</label>
    <input type="text" name="degree" maxlength="30" class="form-control" placeholder="Your Degree">
  </div>
  <div class="form-group">
    <label for="jurusan">Major</label>
    <input type="text" name="jurusan" maxlength="50" class="form-control" placeholder="Majoring" required>
  </div>
  <div class="form-group">
    <label for="nama_instansi">Where do you study?</label>
    <input type="text" name="nama_instansi" maxlength="50" class="form-control" placeholder="Where do you study?" required>
  </div>
  <div class="form-group">
    <label for="informasi_education">Education Description</label>
    <textarea class="form-control" name="informasi_education" maxlength="600" rows="3" placeholder="Education Description" required></textarea>
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>