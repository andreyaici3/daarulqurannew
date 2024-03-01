<?php if (@$type == 'list'): ?>
<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Data Siswa<a href="siswa/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
	      </div>
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="<?= base_url('admin')  ?>">Dashboard</a></li>
	          <li class="breadcrumb-item active"><?= $this->uri->segment(2)  ?></li>
	        </ol>
	      </div>
	    </div>
	  </div>
	  <hr>
	</div>

<section class="content">
  <div class="container-fluid">
    <?=  $this->session->flashdata('msgi') ?>
    <div class="row">
      <div class="col-md">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Siswa Daarul Qur'an</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Username</th>
                    <th>No WhatsApp</th>
                    <th>Status Akun</th>
                    <th>Status Siswa</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($list as $value): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value->nama_siswa  ?></td>
                    <td><?= $value->username  ?></td>
                    <td><?= $value->no_whatsapp  ?></td>
                    <td><?php if ($value->status_akun == 1){ echo "Aktif";} else { echo "Tidak Aktif";}  ?></td>
                    <td><?php if ($value->status_siswa == 1) { echo "Diterima";} else { echo "Belum Diputuskan";}   ?></td>
                    <td align="center">
                      <span style="color: white">
                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/ppdb/detail/' . $this->mapel->encodeUrl($value->id_siswa)) ?>"><i class="fas fa-edit" ></i></a>
                        <!-- <a class="btn btn-sm btn-danger hpsModalSiswa" data-toggle="modal" data-target="#modal-sm" data-id="<?= $value->id_siswa  ?>" data-key="<?= $this->mapel->encodeUrl($value->id_siswa)  ?>"><i class="fas fa-trash" ></i></a> -->
                      </span>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php endif ?>

<?php if (@$type == 'detail'): ?>
	<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Identitas Siswa PPDB <a href="<?= base_url('admin/ppdb') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active"><?= $this->uri->segment(2)  ?></li>
            </ol>
          </div>
        </div>
      </div>
      <hr>
    </div>


    <section class="content">
  <div class="container-fluid">
    <?=  $this->session->flashdata('msgi') ?>
    <div class="row">
      <div class="col-md">
          <div class="card">
          <div class="card-header">
            <h3 class="card-title">Profile Detail</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            	<div class="col-md">
            		<div class="form-group">
            			<label for="exampleInputPassword1">Nama Lengkap</label>
            			<input class="form-control" type="text" value="<?= $list->nama_siswa  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md">
	            	<div class="form-group">
	            		<label for="exampleInputPassword1">Username</label>
	            		<input class="form-control" type="text" value="<?= $list->username ?>"></input>
	            	</div>	
	            </div>
            </div>
            <div class="row">
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Tempat Lahir</label>
            			<input class="form-control" type="text" value="<?= $list->tempat_lahir  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-2">
            		<div class="form-group">
            			<label>Tanggal Lahir</label>
            			<input class="form-control" type="text" value="<?= date('d - m - Y', $list->tanggal_lahir)  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-2">
            		<div class="form-group">
            			<label>No Whatsapp</label>
            			<input class="form-control" type="text" value="<?= $list->no_whatsapp  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Jenis Kelamin</label>
            			<input class="form-control" type="text" value="<?= $list->jenis_kelamin  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-5">
            		<div class="form-group">
            			<label>Alamat</label>
            			<input class="form-control" type="text" value="<?= $list->jln  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-3">
            		<div class="form-group">
            			<label>NIK</label>
            			<input class="form-control" type="text" value="<?= $list->nik  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-2">
            		<div class="form-group">
            			<label>RT</label>
            			<input class="form-control" type="text" value="<?= $list->rt  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-2">
            		<div class="form-group">
            			<label>RW</label>
            			<input class="form-control" type="text" value="<?= $list->rw  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Dusun</label>
            			<input class="form-control" type="text" value="<?= $list->dusun  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Desa</label>
            			<input class="form-control" type="text" value="<?= $list->desa  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Kecamatan</label>
            			<input class="form-control" type="text" value="<?= $list->kec ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Kabupaten</label>
            			<input class="form-control" type="text" value="<?= $list->kota  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Provinsi</label>
            			<input class="form-control" type="text" value="<?= $list->prov  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-6">
            		<div class="form-group">
            			<label>Email</label>
            			<input class="form-control" type="text" value="<?= $list->email  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-8">
            		<div class="form-group">
            			<label>Nama Guru BP / BK</label>
            			<input class="form-control" type="text" value="<?= $list->nama_guru_bp_bk  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>No Telp / Hp</label>
            			<input class="form-control" type="text" value="<?= $list->telp_hp  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md">
            		<div class="form-group">
            			<label>Nama Ayah</label>
            			<input class="form-control" type="text" value="<?= $list->nama_ayah  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-5">
            		<div class="form-group">
            			<label>Tempat Lahir Ayah</label>
            			<input class="form-control" type="text" value="<?= $list->tempat_lahir_ayah  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Tanggal Lahir Ayah</label>
            			<input class="form-control" type="text" value="<?= date('d - m - Y', $list->tanggal_lahir_ayah)  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-3">
            		<div class="form-group">
            			<label>Pendidikan Terakhir Ayah</label>
            			<input class="form-control" type="text" value="<?= $list->pendidikan_terakhir_ayah  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Pekerjaan Ayah</label>
            			<input class="form-control" type="text" value="<?= $list->pekerjaan_ayah  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Penghasilan Perbulan</label>
            			<input class="form-control" type="text" value="<?= $list->penghasilan_perbulan_ayah  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>No. Telephone</label>
            			<input class="form-control" type="text" value="<?= $list->hp_wa_ayah  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md">
            		<div class="form-group">
            			<label>Nama Ibu</label>
            			<input class="form-control" type="text" value="<?= $list->nama_ibu  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-5">
            		<div class="form-group">
            			<label>Tempat Lahir Ibu</label>
            			<input class="form-control" type="text" value="<?= $list->tempat_lahir_ibu  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Tanggal Lahir Ibu</label>
            			<input class="form-control" type="text" value="<?= date('d - m - Y', $list->tanggal_lahir_ibu)  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-3">
            		<div class="form-group">
            			<label>Pendidikan Terakhir Ibu</label>
            			<input class="form-control" type="text" value="<?= $list->pendidikan_terakhir_ibu  ?>"></input>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Pekerjaan Ibu</label>
            			<input class="form-control" type="text" value="<?= $list->pekerjaan_ibu  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>Penghasilan Perbulan</label>
            			<input class="form-control" type="text" value="<?= $list->penghasilan_perbulan_ibu  ?>"></input>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="form-group">
            			<label>No. Telephone</label>
            			<input class="form-control" type="text" value="<?= $list->hp_wa_ibu  ?>"></input>
            		</div>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php endif ?>