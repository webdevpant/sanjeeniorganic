<?php $this->load->view('admin/userpage/components/header'); ?>
<div class="login-box" style="margin: 8% auto;">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" id="fsadfasdf" style="padding: 7px 20px 7px 20px; background-color: #4caf50; margin-bottom: 9px; color: #fff; display: none;"><span id="success"></span></p>
    <p class="login-box-msg" id="fsadfasdfa" style="padding: 7px 20px 7px 20px; background-color: #f00; margin-bottom: 9px; color: #fff; display: none;"><span id="successa"></span></p>

    <p class="login-box-msg" style="padding: 7px 20px 7px 20px; background-color: #00a65a; margin-bottom: 9px; color: #fff;">Select Lead Type</p>

    
    <div class="form-group has-feedback">
        <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
          <option>--SELECT LEAD TYPE--</option>
          <?php foreach ($campaign as $key => $cam) { ?>
            <option value="<?php echo base_url(); ?>Admin/add_mortgage/<?php echo $mobileNo; ?>/<?php echo $cam->campaign_id; ?>"><?php echo $cam->campaign_title; ?></option>
          <?php } ?>
        </select>

        
      </div>
    </div>
    <!--   <a href="<?php //echo base_url(); ?>">Back to Sign In</a>  -->
    <!--<a href="<?php //echo base_url(); ?>login/register" class="text-center">Register a new membership</a> -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->


<?php $this->load->view('admin/userpage/components/footer'); ?>