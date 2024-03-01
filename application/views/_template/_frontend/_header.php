<div class="container">
		<div class="row">
			<div class="col">
				<div class="header_content d-flex flex-row align-items-center justify-content-start">
					<div class="logo_container">
						<a href="<?= base_url(); ?>">
							<div class="logo_text">Daarul <span>Qur'an</span></div>
						</a>
					</div>
					<nav class="main_nav_contaner ml-auto">
						<ul class="main_nav">
							<!-- <li <?php if (@$menuAktif == "Home") { echo "class='active'";} ?>><a href="<?= base_url(); ?>">Home</a></li> -->
							
							<li <?php if (@$menuAktif == "Sekolah") { echo "class='active nav-item dropdown'";} else { echo "class='nav-item dropdown'";} ?> >
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Sekolah
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="<?= base_url(); ?>profile">Profile</a>
						          <a class="dropdown-item" href="<?= base_url(); ?>guru">Guru</a>
						          <a class="dropdown-item" href="<?= base_url(); ?>siswa">Siswa</a>
						        </div>
						    </li>
						    <li><a href="<?= base_url(); ?>ppdb">PPDB</a></li>
							<li <?php if (@$menuAktif == "Galery") { echo "class='active'";} ?>><a href="<?= base_url(); ?>galery">Galeri</a></li>
							<li <?php if (@$menuAktif == "Karya") { echo "class='active nav-item dropdown'";} else { echo "class='nav-item dropdown'";} ?> >
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Karya
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="<?= base_url('puisi'); ?>">Puisi</a>
						        </div>
						    </li>
							<li <?php if (@$menuAktif == "File") { echo "class='active'";} ?>><a href="<?= base_url(); ?>file">Download</a></li>
							<li <?php if (@$menuAktif == "Berita") { echo "class='active'";} ?> ><a href="<?= base_url(); ?>berita">Berita</a></li>
							<li <?php if (@$menuAktif == "About") { echo "class='active'";} ?>><a href="<?= base_url(); ?>about">About</a></li>
						</ul>
						<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

						<!-- Hamburger -->

						<!-- <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div> -->
						<div class="hamburger menu_mm">
							<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>