<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/addSosmed" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <label for="url_sosmed">URL Social Media</label>
    <input type="text" name="url_sosmed" class="form-control" id="url_sosmed" placeholder="Enter url your social media" required>
  </div>
  <div class="form-group">
    <label for="nama_sosmed">Social Media Name</label>
    <input type="text" name="nama_sosmed" class="form-control" id="nama_sosmed" placeholder="social media name" required>
  </div>
  <div class="form-group">
    <label for="icon_sosmed">Social Media Logo</label>
    <input type="text" name="icon_sosmed" class="form-control" id="icon_sosmed" placeholder="socila media icon fa fa" required>
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>