<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/aksiEditPortfolio/<?=$portfolio->id_portfolio?>" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <img id="image-preview" style="width: 100%; height: 100%">
    <label for="capture">Capture</label>
    <input type="file" accept=".jpg,.jpeg,.png" id="image-source" name="content" onchange="previewImage();" class="form-control-file">
  </div>
  <div class="form-group">
    <label for="nama_portfolio">Project Name</label>
    <input type="text" name="nama_portfolio" value="<?=$portfolio->nama_portfolio?>" class="form-control" placeholder="Project name">
  </div>
  <div class="form-group">
    <label for="url_portfolio">URL to Your Project</label>
    <input type="url" name="url_portfolio" value="<?=$portfolio->url_portfolio?>" class="form-control" placeholder="url to your project also type http:// before site name and domain">
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>

<script>
  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>