<!DOCTYPE html>
<html>
<head>
  <?= @$_head ?>
</head>
<?php if (@$page == 'login') : ?>
  <body class="hold-transition login-page">
    <?= @$_content  ?>
    <?= @$_libfooter  ?>
  </body>
<?php endif; ?>

<?php if (@$page == 'admin'): ?>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="font-size: 14px !important; ">
    <div class="wrapper">
      <?= @$_sidebar  ?>
      <?= @$_navbar  ?>
      <?= @$_content ?>
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="">Andrey Andriansyah</a>.</strong>
         All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0

        </div>
      </footer>
    </div>

    <?= @$_libfooter  ?>
  </body>
<?php endif ?>





</html>
