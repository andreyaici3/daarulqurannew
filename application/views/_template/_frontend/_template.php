<!DOCTYPE html>
<html lang="en">
<head>
	<?php if (@$head != "Home"): ?>
		<?= @$_headCont?>	
	<?php else: ?>
		<?= @$_head?>
	<?php endif ?>
	
</head>
<body>
<div class="super_container">
<!-- Header -->
	<header class="header">
		<?= @$_topbar ?>

		<!-- Header Content -->
		<div class="header_container">
			<?= @$_header ?>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<?= @$_search ?>		
		</div>			
	</header>
<!-- end of header -->

<!-- menu area -->
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<?=@$_menu?>
</div>
<!-- end menu area -->

<?= @$_content ?>

<?= @$_footer ?>
<?= @$_libfooter ?>


</body>
</html>
