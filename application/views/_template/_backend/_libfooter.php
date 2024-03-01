   <div class="body-modal">
   <?= form_open();  ?>
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="myModalLabel">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
   <?= form_close();  ?>
  <!-- /.modal -->
  </div>

<!-- jQuery -->
<script src="<?= base_url('assets/back/')  ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/back/')  ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/back/')  ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/back/')  ?>dist/js/style.js"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('assets/back/')  ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- InputMask -->
<script src="<?= base_url('assets/back') ?>/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/back') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/back/')  ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/back/')  ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/back/')  ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/back/')  ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<?php 

    @$a = @$type == 'add' && @$title == 'Tambah Guru';
    @$b = @$type == 'edit' && @$title == 'Edit Data Guru';
    @$c = @$type == 'add' && @$title == 'Tambah Berita';
    @$d = @$type == 'add' && @$title == 'Tambah Siswa';
    @$e = @$type == 'edit' && @$title == 'Edit Berita';
    @$f = @$type == 'add' && @$title == 'Tambah Album';
    @$g = @$type == 'edit' && @$title == 'Edit Album';
    @$h = @$type == 'foto' && @$title == 'Tambah Foto Album';
    @$i = @$type == 'add' && @$title == 'Tambah Document';
    @$j = @$type == 'add' && @$title == 'Tambah Puisi';
    @$k = @$type == 'edit' && @$title == 'Edit Puisi';
    @$l = @$type == 'add' && @$title == 'Pengaturan Slider';


    @$tp = @$title == 'Tambah Pengumuman';
    @$tt = @$title == 'Tambah Berita';
    @$tep = @$title == 'Edit Pengumuman';
    @$teb = @$title == 'Edit Berita';
    @$td =  @$title == 'Tambah Document';
    @$ttp = @$title == 'Tambah Puisi';
    @$ep = @$title == 'Edit Puisi';



    @$kondisi1 = @$a || @$b || @$c || @$d || @$e || @$f || @$g || @$h || @$i || @$j || @$k || $l;
    @$kondisi2 = @$tp || @$tt || @$tep || @$teb || @$td || @$ttp || @$ep;


 ?>

<?php if (  @$kondisi1  ): ?>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url('assets/back/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<?php endif ?>

<?php if ( @$kondisi2 ): ?>
  <script src="<?= base_url('assets/back/') ?>plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
  </script>

<?php endif ?>


<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    <?php if (@$kondisi1 ): ?>
  
      $(document).ready(function () {
        bsCustomFileInput.init();
      });
    
    <?php endif ?>

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

  });


</script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- PAGE SCRIPTS -->
<!-- <script src="dist/js/pages/dashboard2.js"></script> -->
