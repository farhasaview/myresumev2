<div class="col-md-12 bg-light"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/aksiEditIsi/<?=$d?>/<?=$isi[0]['id_content']?>" method="post" enctype="multipart/form-data" data-toggle="validator">
  <div class="form-group">
    <label for="isi"><?=$d?></label>

    <?php if($d == "logo" || $d == "img_bg_paralax" || $d == "foto_profil" || $d == "img_bg_contact"){
        if ($d == "logo" && $isi[0][$d] != ''){ ?>
        <img id="image-preview" src="<?=base_url()?>penyimpanan_file/images/<?=$isi[0][$d]?>" style="width: 100%; height: 100%">
        <?php }
        if ($d == "img_bg_paralax" && $isi[0][$d] != ''){ ?>
        <img id="image-preview" src="<?=base_url()?>penyimpanan_file/images/<?=$isi[0][$d]?>" style="width: 100%; height: 100%">
        <?php }
        if ($d == "foto_profil" && $isi[0][$d] != ''){ ?>
        <img id="image-preview" src="<?=base_url()?>penyimpanan_file/images/<?=$isi[0][$d]?>" style="width: 100%; height: 100%">
        <?php }
        if ($d == "img_bg_contact" && $isi[0][$d] != ''){ ?>
        <img id="image-preview" src="<?=base_url()?>penyimpanan_file/images/<?=$isi[0][$d]?>" style="width: 100%; height: 100%">
        <?php } ?>
    <img id="image-preview" style="width: 100%; height: 100%">
    <input type="file" accept=".jpg,.jpeg,.png" id="img" name="content" value="<?=$isi[0][$d]?>" onchange="previewImage();" class="form-control-file" required>
    <?php }?>

    <?php if($d == "file_cv"){?>
    <input type="file" accept=".pdf" id="cv" name="content" onchange="previewCV();" class="form-control-file" required>
    <button type="reset" onclick="(function() {document.getElementById('myDiv').style.display = 'none';})();" class="btn btn-dark btn-sm">Reset</button>
    <div id="myDiv" class="embed-responsive embed-responsive-1by1">
      <iframe class="embed-responsive-item" id="preview_cv" allowfullscreen></iframe>
    </div>
    <?php }?>
    
    <?php if ($d == "nama" || $d == "profesi" || $d == "bi_language" || $d == "bi_email") {?>
    <input type="text" name="content" value="<?=$isi[0][$d]?>" class="form-control" required>
    <?php }?>

    <?php if ($d == "bi_address_map") {?>
    <input type="url" name="content" placeholder="type http://yourMapURL" value="<?=$isi[0][$d]?>" class="form-control" required>
    <?php }?>

    <?php if($d == "about" || $d == "bi_address"){ ?>
    <textarea class="form-control" name="content" rows="13" required><?=$isi[0][$d]?></textarea>
    <?php }?>

    <?php if ($d == "bi_tgl_lahir") {?>
    <input type="date" name="content" value="<?=$isi[0][$d]?>" class="form-control" required>
    <?php }?>

    <?php if($d=="bi_phone") {?>
    <input type="text" name="content" value="<?=$isi[0][$d]?>" maxlength="15" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
    <?php }?>
  
  </div>
  <?php if($d == "file_cv"):?>
    <button type="submit" class="btn btn-outline-success btn-block" onclick="return validationPdf()">Submit</button><br>
    <?php else:?>
        <button type="submit" class="btn btn-outline-success btn-block" onclick="return validationImg()">Submit</button><br>
    <?php endif; ?>
</form>
</div>

<script>
    function validationPdf() {
        var fileInput = document.getElementById('cv');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;
        var ukuranFile = fileInput.files[0];

        if(!allowedExtensions.exec(filePath)) { // jika ektensi file tidak sesuai
           alert('Harap upload file dengan ektensi pdf untuk file CV !');
            fileInput.value = '';
            return false;
        }
        
        if (ukuranFile.size > 10485760) // 10 mb for bytes.
        {
            alert('Ukuran file maksimal 10MB. ..!');
            fileInput.value = '';
            return false;
        }
    }

    function validationImg() {
        var fileInput = document.getElementById('img');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var ukuranFile = fileInput.files[0];

        if(!allowedExtensions.exec(filePath)) { // jika ektensi file tidak sesuai
           alert('Harap upload file dengan ektensi jpeg,jpg,png untuk gambar !');
            fileInput.value = '';
            return false;
        }
        
        if (ukuranFile.size > 10485760) // 10 mb for bytes.
        {
        	alert('Ukuran file maksimal 10MB. ..!');
            fileInput.value = '';
            return false;
        }
    }

    // preview di tag img
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("img").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        }
    }

     // default hide div dengan id myDiv dengan anonymous function ini
    (function() {
        document.getElementById("myDiv").style.display = "none";
    })();

    // function untuk preview di iframe
    function previewCV() {
        document.getElementById("myDiv").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("cv").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("preview_cv").src = oFREvent.target.result;
        }
    }
</script>