<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?=$content['nama']?>, <?=base_url()?>">
    <meta tag="">
    <meta name="author" content="<?=$content['nama']?>">
    <link rel="icon" href="<?=base_url()?>penyimpanan_file/favicon.ico" type="image/ico">
	<?php $hilangkanKarakterBerikut = ['http', ':', '/']; ?>
	<title><?=str_replace($hilangkanKarakterBerikut, "", base_url())?> by <?=$content['nama']?></title>
    <!-- <title>My Resume V2 by <?=$content['nama']?></title> -->
    <meta name="description" content="<?=$content['nama']?>, <?=base_url()?> is a website for <?=$content['nama']?>'s profile">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>styles_publik/css/aos.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>styles_publik/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>styles_publik/styles/main.css">
</head>
  <!--<body id="top" oncontextmenu="return false;">-->
  <body id="top">
  <?php
  date_default_timezone_set('Asia/Jakarta');
  if (date("m-d") == date("m-d", strtotime($content['bi_tgl_lahir']))){?>
<audio autoplay>
    <source src="<?=base_url()?>penyimpanan_file/hbd1.mp3" type="audio/mp3">
</audio>
    <?php }else{echo null;} ?>
    <header>
      <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"><?=$content['nama']?>'s profile</a>
            <!-- <div class="navbar-translate"><a class="navbar-brand" href="<?=base_url()?>" rel="tooltip" title="is my name"><img src='<?php echo base_url("penyimpanan_file/images/".$content['logo'])?>' alt=""></a> -->
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>