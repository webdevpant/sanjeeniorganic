
<footer class="main-footer navbar-fixed-bottom" style="text-transform: uppercase;">
	<div class="container">
<div class="pull-right hidden-xs">
  <b>Version</b> 1.1.1
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo $adminData->copyright_url; ?>" target="_blanck"><?php echo $adminData->copyright; ?></a> All rights
reserved. Design & Development by <a href="https://www.Sanjeevani.com" target="_blank">Sanjeevani Technology Pvt. Ltd.</a></strong>
</div>
</footer>


 <script src="<?php echo base_url();?>admin_assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>admin_assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
