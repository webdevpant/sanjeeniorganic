<?php $this->load->view('admin/components/header'); ?>
    <div class="wrapper">

     <?php       
          $this->load->view('admin/components/top-header');          
      ?>
      <style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
    <?php $this->load->view('admin/components/left_menu');    ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title;?> | <a href="show_add_user">Add Users</a>
           <!--  <small>Version 2.0</small> -->
          </h1>
         <!--  <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                   <div class="box-body">
                    <div class="col-md-12">
                      <table id="example" class="table table-bordered table-striped display" >
                          <thead>
                            <tr>
                              <th>#</th>
                              <!-- <th>Code</th> -->
                              <th>Name</th>
                              <th>Email</th>
                              <th>User Type</th>
                              <th>Role</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Dob</th> 
                              <th>City</th>                           
                              <th>Status</th>  
                              <th>Actions</th>                           
                            </tr>
                          </thead>

                          <!-- <tfoot>
                            <tr>
                                <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>User Type</th>
                              <th>Phone</th>
                              <th>Address</th>                            
                              <th>Status</th>  
                              <th>Actions</th>
                            </tr>
                        </tfoot> -->
                           <tbody>
                            <?php $i=0;
                             $sess_data=$this->session->userdata('admin_gym_logged_in');
                              $user_type=$sess_data['user_type']; ?>
                           
                            <?php if (!empty($users_list)): foreach ($users_list as $userslist) : ?>
                            <?php $usersid=$userslist->id; ?>
                            <tr id="lead_<?php echo $usersid;?>">
                                <td><?php $i++; echo $i; ?></td> 
                                <td><?php echo $userslist->first_name." ".$userslist->last_name; ?></td>                               
                                <td><?php echo $userslist->email;?></td>
                                <td><?php echo $userslist->user_name; ?></td>
                                 <td><?php echo $userslist->role_name; ?></td>
                                <td><?php echo $userslist->phone;?></td>
                                <td><?php echo $userslist->address;?></td>
                                <td><?php echo $userslist->dob;?></td>
                                <td><?php echo $userslist->city;?></td>                                
                                <td><input type="checkbox" disabled="disabled" name="" id="" <?php if($userslist->status==1){echo 'checked';} ?>></td>
                                
                                <td>
                                   <a href="#" class="badge bg-aqua" onclick="return EditUser('show_edit_user','<?php echo $userslist->id;?>')" title="Edit" ><i class="fa fa-edit"></i></a>
                                  <?php if($userslist->status==1){ ?>
                                    <a href="#" class="badge bg-red" onclick="return DeactivateUser(<?php echo $usersid; ?>)" title="De-activate" ><i class="fa fa-ban "></i></a>            <?php }else{ ?>                            
                                    <a href="#" class="badge bg-green" onclick="return ActiveUser(<?php echo $usersid; ?>)" title="Activate" ><i class="fa fa-check-circle "></i></a>
                                  <?php } ?>
                                   <?php if($user_type==1){ ?>
                                    <a href="#" class="badge bg-red" onclick="return deleteUser(<?php echo $usersid; ?>)" title="Delete" ><i class="fa fa-trash "></i></a>
                                  <?php } ?>
                                </td>
                                
                            </tr>
                            <?php  endforeach;?>
                            
                            <?php endif; ?>
                          </tbody>
                        </table> 
                    </div>
                </div>
                </div>
               </div>
              </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>







    <script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>
<script type="text/javascript">

    
    function deleteUser(usersid) 
     {
        if (confirm("Are you sure to delete?")) 
          { 
            // your deletion code
              url = "deleteUser";
              $.post(url, {UserId:usersid},  function (data) {
              alert(data);
              location.reload();
               },"json");
         }
      return false;
    }
    function EditUser(act,usersid)
    {

      if(act=="show_edit_user")
      {
        window.location="<?php echo base_url();?>index.php/admin/User/"+act+"/"+usersid;
      }
    } 
    function DeactivateUser(usersid) 
     {
        url = "DeactivateUser";
        $.post(url, {UserId:usersid},  function (data) {
        alert(data);
        location.reload();
         },"json");
    }

    function ActiveUser(usersid) 
     {
        url = "ActivateUser";
        $.post(url, {UserId:usersid},  function (data) {
        alert(data);
        location.reload();
         },"json");
    }

    
</script>

<script type="text/javascript">
  
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

</script>

<?php $this->load->view('admin/components/footer-js'); ?>

<!-- Modal -->

                                                      
<!-- end modal -->




