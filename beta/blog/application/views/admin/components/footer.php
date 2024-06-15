<!-- <script type="text/javascript">
setTimeout(onUserInactivity, 1000 * 600)
function onUserInactivity() {
   window.location.href = "<?php //echo base_url('Admin/logout');?>"
}
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="company_state"]').on('change', function() {
            //alert('Check Value');
            var state_id = $(this).val();
            if(state_id) {
                //alert(state_id);
                $.ajax({
                    url: '<?php echo base_url(); ?>Admin/getCityForAjax/'+state_id,
                    type: "POST",
                    dataType: "json",
                    success:function(data) {
                        //alert('Check Value');
                        $('select[name="company_city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="company_city"]').append('<option value="'+ value.city_id +'">'+ value.city_name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="company_city"]').empty();
            }
        });
    });
</script>
<footer class="main-footer navbar-fixed-bottom" style="text-transform: uppercase;">
<div class="pull-right hidden-xs">
  <b>Version</b> 1.1.1
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo $adminData->copyright_url; ?>" target="_blanck"><?php echo $adminData->copyright; ?></a> All rights
reserved. Design & Development by <a href="#" target="_blank">Sanjeevani</a></strong>
</footer>