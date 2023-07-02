<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Halaman Admin My Resume V2">
    <meta name="keywords" content="myresume, myresumev2, my resume, resume, versi 2, v2, febi, aris, rinaldi, febi aris rinaldi, website, situs, site, ciletuh geopark, ciwaru, tamanjaya, surade, jampang, orang jampang, kecamatan ciemas, kecamatan surade, gunung sunging">
    <meta name="author" content="Febi Aris Rinaldi">
    <!-- <link rel="icon" href="favicon.ico" type="image/ico"> -->
    <title>Halaman Admin My Resume V2</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>styles_publik/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="btn btn-outline-dark btn-lg" type="button" href="<?=base_url()?>login/logout" rel="tooltip" title="Logout"><i class="fa fa-power-off"></i></a>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg btn-outline-dark" href="<?=base_url()?>admin" rel="tooltip" title="home"><i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn btn-lg btn-outline-dark" href="<?=base_url()?>admin/all" rel="tootip" title="atur akun admin"><i class="fa fa-user"></i></a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link btn btn-lg btn-outline-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-spin fa-fw"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=base_url()?>admin/maintenanceMode">Maintenance Mode</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allContent">Content</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allFollowMe">SocMed</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allSkill">Skills</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allPortfolio">Portfolio</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allWorkExperience">Work Experience</a>
                        <a class="dropdown-item" href="<?=base_url()?>admin/allEducation">Education</a>
                        <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>