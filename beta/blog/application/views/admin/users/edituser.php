<?php $this->load->view('admin/components/header_css.php'); ?>
<div class="wrapper">

  <?php $this->load->view('admin/components/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/components/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
    .dataTables_filter{
      text-align: right;
    }
    .paging_simple_numbers {
      text-align: right;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Edit Employes
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Edit Employes</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
         <div class="row">
             
              
              <div class="col-md-12">
                  <div class="box box-info">
                     <div class="box-header with-border">
           
             <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>Admin/show_add_user" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Employes </a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/show_user_list" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Employes List</a>&nbsp;
            </div> 
            <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
                      
                    
                  <div id="userAddEdit">

                    <form action="<?php echo base_url();?>Admin/edit_user" method="post" name="Frmgroup" id="Frmgroup" style="margin-bottom:0px;">
                      <div class="row">
                      	<div class="col-md-2">&nbsp;</div>
	                       <div class="col-md-8 box-body">
	                            
	                              
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>FirstName
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php if(!empty($user_specific_data)){echo $user_specific_data->first_name;} ?>">
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_specific_data->id; ?>">
                                      </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>LastName
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php if(!empty($user_specific_data)){echo $user_specific_data->last_name;} ?>">
                                      </div>
                                  </div>
                               </div>                              
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Email
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <input type="text" name="email" id="email" class="form-control" value="<?php echo $user_specific_data->email;  ?>" />
                                      </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>User Type
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <select id="user_type" name="user_type" class="select2 form-control" >
                                            <option value="">Select User Type</option>
                                            <?php foreach($user_role as $userrole): ?>
                                              <option value="<?php echo $userrole->id;  ?>"  <?php echo ($userrole->id==$user_specific_data->user_type)?"selected":"" ?> ><?php echo $userrole->user_name;  ?></option>
                                            <?php endforeach;  ?>
                                          </select>
                                      </div>
                                  </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Phone
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user_specific_data->phone;  ?>" />
                                      </div>
                                  </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Gender
                                        <span class="required"></span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <input  type="radio" name="gender" id="gender" value="male" <?php if($user_specific_data->gender==1): ?> checked="checked" <?php endif;  ?> >
                                           <label>
                                                  Male
                                           </label>
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           <input  type="radio" name="gender" id="gender" value="female" <?php if($user_specific_data->gender==2): ?> checked="checked" <?php endif;  ?> >
                                           <label >
                                                  Female
                                           </label>
                                      </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Address
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <textarea id="address" name="address" class="form-control" ><?php echo $user_specific_data->address ; ?></textarea>
                                      </div>
                                  </div>
                               </div>
	                             
	                              
	                             
	                              <div class="row">
	                                <div class="col-md-12">
	                                	<div class="form-group col-md-4">&nbsp;
	                                	</div>
	                                    <div class="form-group col-md-5">
										    <input type="checkbox" name="status" id="status" disabled="disabled" value="1" <?php if($user_specific_data->status==1) echo "checked";?> >&nbsp; Active
	                                    </div> 
	                                    <div class="form-group col-md-3">
	                                        <button type="submit" class="btn btn-primary btn-sm pull-right btn-block bg-aqua" >UPDATE</button>
	                                    </div>
	                                </div>
	                               
	                             </div>
	                         <span id="userMessage"></span>
                     </div>
                     <div class="col-md-2">&nbsp;</div>
                      </div>
                       </form>
                   </div>
                 
                  </div>
              
               </div>
              
              
              </div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
    
<script>
  // When the browser is ready...
  $(function() {
       $("#Frmgroup").validate({
         
      
        // Specify the validation rules
        rules: {
          first_name: {
            required: true
            },
          last_name:{
            required: true    
            },
          email:{
                 required:true,
                  email:true
            },
          user_type:{
                required:true
              },
          phone:{
            required: true,
            minlength: 10,
            maxlength:11,
            number: true              
            },
          gender:{
              required:true
            },
          address:{
                required:true,               
            },
            password:{
              required:true,
              minlength:6
            },
            confirm_password:{
              required:true,
              equalTo:'#password'
            }
          },
        
        // Specify the validation error messages
        messages:{
              first_name: {
                required: "Please Enter First Name"
              },
              last_name: {
              required: "Please Enter Last Name"
              },
              email:{
                 required: "Please Enter e-mail",
                 email: "Please Enter a valid e-mail"
              },
              user_type:{
                required:"Select User Type"
              },                         
              phone: {
                required: "Please Enter mobile no.",
                minlength: "Please Enter 10 digit mobile number",
                maxlength: "Please Enter no more than 10 digit" 
              },
              gender:{
                required:"Select Gender"
              },
              address:{
                required:"Enter Address"               
              },
              password:{
                required:"Enter password"
              },
              confirm_password:{
                required:"Enter Confirm Password"
              }
            },
        
        submitHandler: function(form) {
               
            form.submit();
        }
    });

  });
  
  </script>
  <!-- <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> -->

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>