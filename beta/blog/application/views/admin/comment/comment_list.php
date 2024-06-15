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
       Comment List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Comment List</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
             <div class="col-lg-5 btn-class">
              Comment List
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
                   
                   <div class="box-body">
                    <div class="col-md-12">
                      <table id="example" class="table table-bordered table-striped display" >
                          <thead>
                            <tr>
                              <th>#</th>
                              <!-- <th>Code</th> -->
                              <th>Name</th>
                              <th>Email</th>
                              <th>Comment</th>
                              <th>Create At</th>
                              
                              <th>Actions</th>                           
                            </tr>
                          </thead>

                         
                           <tbody>
                            <?php $i=0;
                          
                               ?>
                           
                            <?php if (!empty($commentlist)): foreach ($commentlist as $comment) : ?>
                            
                            <tr>
                                <td><?php $i++; echo $i; ?></td> 
                                <td><?php echo $comment->user_name; ?></td>                               
                                <td><?php echo $comment->user_email;?></td>
                                <td><?php echo $comment->comment_text; ?></td>
                                <td><?php echo $comment->create_at; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>Admin/commentstatus/<?php echo $comment->id; ?>/3" class="badge bg-red" title="De-activate" >Delete</a>          
                                  <?php if($comment->status==0){ ?>
                                    <a href="<?php echo base_url(); ?>Admin/commentstatus/<?php echo $comment->id; ?>/1" class="badge bg-red" title="De-activate" ><i class="fa fa-ban "></i></a>          
                                    <?php }else{ ?>                            
                                    <a href="<?php echo base_url(); ?>Admin/commentstatus/<?php echo $comment->id; ?>/0" class="badge bg-green"  title="Activate" ><i class="fa fa-check-circle "></i></a>
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
              url = "deleteUsers";
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
        window.location="<?php echo base_url();?>Admin/"+act+"/"+usersid;
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
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>