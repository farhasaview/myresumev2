    <footer class="footer">
      <div class="container text-center">
        <?php if (empty($allFollowMe)) {echo null;}else{ foreach ($allFollowMe as $sosmed) {?>
        <a onclick="window.open('<?=$sosmed['url_sosmed']?>');" class="cc-<?=$sosmed['nama_sosmed']?> btn btn-link" href="javascript:void(0)" rel="tooltip" title="My <?=ucfirst($sosmed['nama_sosmed'])?>"><i class="<?=$sosmed['icon_sosmed']?> fa-2x " aria-hidden="true"></i></a>
      <?php }}?>
      </div>
      <div class="h4 title text-center"><a onclick="sayMyName('<?=$content['nama']?>');"><?=$content['nama']?></a></div>
      <div class="text-center text-muted">
        <!-- <p>&copy; 2020 My Resume v2.1.2 by <a onclick="sayMyName('<?=$content['nama']?>');"><?=$content['nama']?></a>.<br>
        All rights reserved.</p> -->
		<?php $hilangkanKarakterBerikut = ['http', ':', '/']; ?>
		<p>&copy; 2020 <?=str_replace($hilangkanKarakterBerikut, "", base_url())?> v2.1.2 by <a onclick="sayMyName('<?=$content['nama']?>');"><?=$content['nama']?></a>.<br>
        All rights reserved.</p>
      </div>
    </footer>
    <script src="<?=base_url()?>styles_publik/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?=base_url()?>styles_publik/js/core/popper.min.js"></script>
    <script src="<?=base_url()?>styles_publik/js/core/bootstrap.min.js"></script>
    <script src="<?=base_url()?>styles_publik/js/now-ui-kit.js?v=1.1.0"></script>
    <script src="<?=base_url()?>styles_publik/js/aos.js"></script>
    <script src="<?=base_url()?>styles_publik/scripts/main.js"></script>
    <script src="<?=base_url()?>styles_publik/js/swal.js"></script>
    <script src="<?=base_url()?>styles_publik/js/otakatik.js"></script>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    if (date("m-d") == date("m-d", strtotime($content['bi_tgl_lahir']))){?>
    <script src="<?=base_url()?>styles_publik/js/snowfall.js"></script>
    <?php }else{echo null;}
    ?>
</body>