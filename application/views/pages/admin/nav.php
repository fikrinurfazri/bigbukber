<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="<?= base_url() ?>admin/dashboard">
                    <h1 class="tm-site-title mb-0">BigBukber</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->router->class == 'dashboard' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        </li>

                        <?php if ($user['LEVEL'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'periode' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/periode">
                                    <i class="far fa-calendar"></i>
                                    Periode
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'user' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/user">
                                    <i class="far fa-user"></i>
                                    User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'korcam' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/korcam">
                                    <i class="far fa-user"></i>
                                    Korcam
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'galeri' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/galeri">
                                    <i class="fa fa-image"></i>
                                    Galeri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'artikel' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/artikel">
                                    <i class="fa fa-newspaper"></i>
                                    Artikel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'anak' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/anak/getadmin">
                                    <i class="fa fa-child"></i>
                                    Anak
                                </a>
                            </li>
                        <?php } else { ?>

                            <li class="nav-item">
                                <a class="nav-link <?= $this->router->class == 'anak' ? 'active' : ''; ?> " href="<?= base_url() ?>admin/anak">
                                    <i class="fa fa-child"></i>
                                    Anak
                                </a>
                            </li>
                        <?php } ?>



                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>admin/laporan">
                                <i class="far fa-file-alt"></i>
                                Laporan
                            </a>
                        </li>
                    </ul>
                    <?php
                    $user =  $this->db->select('*')
                        ->from('admin')
                        ->join('korcam ', 'korcam.id_korcam = admin.id_korcam', 'left')
                        ->where('ID_ADMIN', $this->session->userdata('ID_ADMIN'))
                        ->get()->row_array();
                    ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>admin/user/profile"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="<?= base_url() ?>auth/logout"><i class="fa fa-arrow-left"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>