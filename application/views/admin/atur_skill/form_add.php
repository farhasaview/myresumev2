<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/addSkill" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <label for="nama_skill">Skill</label>
    <input type="text" name="nama_skill" class="form-control" id="url_sosmed" placeholder="Your skill" required>
    
  </div>
  <div class="form-group">
    <label for="persen_skill">Percentage Of Your Skill type only number of percentage</label>
    <input type="text" name="persen_skill" maxlength="3" minlength="1" class="form-control" id="persen_skill" placeholder="type only number of percentage" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>