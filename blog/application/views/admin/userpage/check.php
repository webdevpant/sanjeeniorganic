<?php $this->load->view('admin/userpage/components/header'); ?>
<style type="text/css">
  table#example1 {
    background-color: #fff;
     margin-bottom: 76px;
}
</style>
<div class="login-box" style="margin: 8% auto;">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" id="fsadfasdf" style="padding: 7px 20px 7px 20px; background-color: #4caf50; margin-bottom: 9px; color: #fff; display: none;"><span id="success"></span></p>
    <p class="login-box-msg" id="fsadfasdfa" style="padding: 7px 20px 7px 20px; background-color: #f00; margin-bottom: 9px; color: #fff; display: none;"><span id="successa"></span></p>

    <p class="login-box-msg" style="padding: 7px 20px 7px 20px; background-color: #00a65a; margin-bottom: 9px; color: #fff;">Clean Phone Number Validation</p>

    <form action="<?php echo base_url(); ?>Admin/select_lead" method="post">
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Phone Number" id="phone_no" name="mobile">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('mobile'); ?>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-3">
          <input type="submit" value="Submit" id="checkNumber" class="btn btn-primary  btn-flat">
        </div>
        <div class="col-xs-3">
        <input type="reset" value="Reset" name="submit" id="submit" class="btn btn-primary  btn-flat">
      </div>
      <div class="col-xs-3">
          <input type="submit" value="Go" name="submit" id="gos" class="btn btn-success btn-flat" style="display: none;">
        </div>
        <!-- /.col -->
      </div>
    </form>


    
    <!--   <a href="<?php //echo base_url(); ?>">Back to Sign In</a>  -->
    <!--<a href="<?php //echo base_url(); ?>login/register" class="text-center">Register a new membership</a> -->
  </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<?php
  $admin_session=$this->session->userdata('login-in');
  if ($admin_session['user_type'] != 4) { ?>
    <div class="container">
      <div class="row">
          <div class="box-body">
                     <table id="example1" class="table table-bordered table-striped display" >
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Name</th>
                <!-- <th>Mobile No.</th> -->
                <th>Campaign</th>
                <th>Agent Name</th>
                <!-- <th>Remark Status</th> 
                <th>Comment</th>    -->                        
              </tr>
            </thead>
            <tbody id="myTable">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php }?>

 <?php $this->load->view('admin/userpage/components/footer'); ?>
 <script>
$('#checkNumber').on('click',function(){
            //alert('Hello');
            var mobile = $('#phone_no').val();
            //alert(mobile);
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/checkmobilenumber.html')?>",
                dataType : "JSON",
                data : {mobile:mobile},
                success: function(data){
                  //alert(data);
                  if(data.block_status == 1){
                    //alert(data.data_lists);
                      $("#success").html(data.success);
                      $('#myTable').html(data.data_lists);
                      document.getElementById('gos').style.display = "block";
                      document.getElementById('checkNumber').style.display = "none";
                      document.getElementById('fsadfasdf').style.display = "block";
                      document.getElementById('fsadfasdfa').style.display = "none";
                  }else{
                     $("#successa").html(data.success);
                      document.getElementById('checkNumber').style.display = "block";
                      document.getElementById('gos').style.display = "none";
                      document.getElementById('fsadfasdfa').style.display = "block";
                      document.getElementById('fsadfasdf').style.display = "none";
                  }
                }
            });
            return false;
   }); 

  </script> 