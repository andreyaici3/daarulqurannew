
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('admin') ?>" class="brand-link">
      <img src="<?= base_url('assets/images/config/pp1.png')  ?>" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">Daarul Qur'an</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/config/person.png') ?>" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="" class="d-block"><?= $this->userdata->nama_lengkap ?></a>    
            </div>
        </div>
        <!-- End Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <?php if (!$this->uri->segment(2)){ $dashboard = 'nav-link active'; } else { $dashboard = 'nav-link'; } ?>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('dashboard') ?>" class='<?= @$dashboard ?>'>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- End Dashboard -->
                <?php $hak = $this->auth->select($this->userdata->email)->row(); ?>
                <?php if ($hak->level == 1){ ?>
                <!-- Master Data -->
                <!-- logic untuk master data -->
                <?php
                    $url = $this->uri->segment(2);
                    $mpl = $url == 'mapel';
                    $kls = $url == 'kelas';
                    $gru = $url == 'guru';
                    $swa = $url == 'siswa';
                    if ($mpl || $kls || $gru || $swa){
                        $master = 'nav-item has-treeview menu-open';
                    } else {
                        $master = 'nav-item has-treeview';
                    }
                ?>
                <!-- end logic untuk master data -->
                <li class="<?= $master ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-digital-tachograph"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <!-- Logic Untuk Menu Mapel -->
                        <?php
                            $ttl = $title == 'Mata Pelajaran'; 
                            $adm = $title == 'Tambah Mata Pelajaran';
                            $edt = $title == 'Edit Mata Pelajaran';
                            if ( $ttl || $adm || $edt){
                                $mapel = "nav-link active";
                            } else {
                                $mapel = "nav-link";
                            }

                        ?>
                        <!-- End Logic Untuk Menu Mapel -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/mapel') ?>" class="<?= $mapel ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>

                        <!-- logic untuk data kelas -->
                        <?php
                            $ttlKlas = $title == 'Kelas';
                            $admKlas = $title == 'Tambah Kelas';
                            if ($ttlKlas || $admKlas){
                                $kelas = "nav-link active";
                            } else {
                                $kelas = "nav-link";
                            }
                        ?>
                        <!-- end logic untuk data kelas -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kelas') ?>" class="<?= $kelas ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>
                        <!-- logic untuk data guru -->
                        <?php
                            $ttlGuru = $title == 'Guru';
                            $admGuru = $title == 'Tambah Guru';
                            $edtGuru = $title == 'Edit Data Guru';
                            if ($ttlGuru || $admGuru || $edtGuru){
                                $guru = 'nav-link active';
                            } else {
                                $guru = 'nav-link';
                            }
                        ?>
                        <!-- end logic untuk data guru -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/guru') ?>" class="<?= $guru ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>

                        <!-- logic untuk data siswa -->
                        <?php
                            $ttlSiswa = $title == 'Data Siswa';
                            $admSiswa = $title == 'Tambah Siswa';
                            $edtSiswa = $title == 'Edit Data Siswa';
                            if ($ttlSiswa || $admSiswa || $edtSiswa){
                                $siswa = 'nav-link active';
                            } else {
                                $siswa = 'nav-link';
                            }
                        ?>
                        <!-- end logic untuk data siswa -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/siswa') ?>" class="<?= $siswa ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Master Data -->

                


                <!-- Menu Content -->
                <!-- Logic Content -->
                <?php
                    $url = $this->uri->segment(2);
                    $png = $url == 'pengumuman';
                    $brt = $url == 'berita';
                    $glr = $url == 'album';
                    $upl = $url == 'doc';
                    if ($png || $brt || $glr || $upl){
                        $content = 'nav-item has-treeview menu-open';
                    } else {
                        $content = 'nav-item has-treeview';
                    }
                ?>
                <!-- End Logic Content -->
                <li class="<?= $content ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <!-- Logic Untuk Menu Mapel -->
                        <?php
                            $ttlPng = $title == 'Pengumuman'; 
                            $admPng = $title == 'Tambah Pengumuman';
                            $edtPng = $title == 'Edit Pengumuman';
                            if ( $ttlPng || $admPng || $edtPng){
                                $liPng = "nav-link active";
                            } else {
                                $liPng = "nav-link";
                            }

                        ?>
                    <!-- End Logic Untuk Menu Mapel -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pengumuman') ?>" class="<?= $liPng ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengumuman</p>
                            </a>
                        </li>
                        <!-- logic untuk menu berita -->
                        <?php
                            $ttlBrt = $title == 'Berita'; 
                            $admBrt = $title == 'Tambah Berita';
                            $edtBrt = $title == 'Edit Berita';
                            if ( $ttlBrt || $admBrt || $edtBrt){
                                $liBrt = "nav-link active";
                            } else {
                                $liBrt = "nav-link";
                            }

                        ?>
                        <!-- End Logic untuk menu berita -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/berita') ?>" class="<?= $liBrt ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <!-- logic untuk menu Album -->
                        <?php
                            $ttlGlr = $title == 'Album'; 
                            $admGlr = $title == 'Tambah Foto Album';
                            $edtGlr = $title == 'Edit Album';
                            $adtGlr = $title == 'Tambah Album';
                            if ( $ttlGlr || $admGlr || $edtGlr || $adtGlr){
                                $liGlr = "nav-link active";
                            } else {
                                $liGlr = "nav-link";
                            }

                        ?>
                        <!-- End Logic untuk menu Album -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/album') ?>" class="<?= $liGlr ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Galery</p>
                            </a>
                        </li>
                         <!-- Logic Untuk Menu Document -->
                         <?php
                            $ttlDoc = $title == 'Document'; 
                            $admDoc = $title == 'Tambah Document';
                            if ( $ttlDoc || $admDoc){
                                $liDoc = "nav-link active";
                            } else {
                                $liDoc = "nav-link";
                            }

                        ?>
                        <!-- End Logic Untuk Menu Document -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/doc') ?>" class="<?= $liDoc ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload File</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Content -->

                <?php } ?>

                <!-- Menu Karya -->
                <!-- Logic Karya -->
                <?php
                    $url = $this->uri->segment(2);
                    $psi = $url == 'puisi';
                    $cpn = $url == 'cerpen';
                    if ($psi || $cpn){
                        $puisi = 'nav-item has-treeview menu-open';
                    } else {
                        $puisi = 'nav-item has-treeview';
                    }
                ?>
                <!-- End Logic Karya -->
                <li class="<?= $puisi ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Karya
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <!-- Logic Untuk Menu Puisi -->
                        <?php
                            $ttlPsi = $title == 'Puisi'; 
                            $admPsi = $title == 'Tambah Puisi';
                            $edtPsi = $title == 'Edit Puisi';
                            if ( $ttlPsi || $admPsi || $edtPsi){
                                $liPsi = "nav-link active";
                            } else {
                                $liPsi = "nav-link";
                            }

                            $ttlCpn = $title == 'Cerpen';
                            if ($ttlCpn){
                                $liCpn = "nav-link active";
                            } else {
                                $liCpn = "nav-link";
                            }

                        ?>
                        <!-- End Logic Untuk Menu Puisi -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/puisi') ?>" class="<?= $liPsi ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Puisi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/cerpen') ?>" class="<?= $liCpn ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cerpen</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Karya -->

                <?php if ($hak->level == 1){ ?>
                <!-- Menu PPDB -->
                <!-- logic untuk ppdb -->
                <?php
                    $url = $this->uri->segment(2);
                    $ppdb = $url == 'ppdb';
                    if ($ppdb){
                        $Ppdb = 'nav-item has-treeview menu-open';
                    } else {
                        $Ppdb = 'nav-item has-treeview';
                    }
                ?>
                <!-- end logic untuk master data -->
                <li class="<?= $Ppdb ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            PPDB
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Logic Untuk Menu Document -->
                        <?php
                            $ttlPpdb = $title == 'PPDB SISWA'; 
                            if ( $ttlPpdb){
                                $liPpdb = "nav-link active";
                            } else {
                                $liPpdb = "nav-link";
                            }

                        ?>
                        <!-- End Logic Untuk Menu Document -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/ppdb') ?>" class="<?= $liPpdb ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List PPDB</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu PPDB -->

                <!-- Menu WEB -->
                <!-- logic untuk WEB -->
                <?php
                    $url = $this->uri->segment(2);
                    $set = $url == 'slider';
                    if ($set){
                        $set = 'nav-item has-treeview menu-open active';
                    } else {
                        $set = 'nav-item has-treeview';
                    }
                ?>
                <!-- end logic untuk master data -->
                <li class="<?= $set ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Setting Website
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Logic Untuk Menu Document -->
                        <?php
                            $ttlSet = $title == 'Pengaturan Slider'; 
                            if ( $ttlSet){
                                $liSet = "nav-link active";
                            } else {
                                $liSet = "nav-link";
                            }

                        ?>
                        <!-- End Logic Untuk Menu Document -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/slider') ?>" class="<?= $liSet ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu WEB -->
                <?php } ?>

                <!-- Logout -->
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('auth/logout') ?>" class='nav-link'>
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
                <!-- End Logout -->

            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->
</aside>
<!-- End Main Sidebar Container -->
