<?php $this->load->view('admin/userpage/components/header'); ?>
<style type="text/css">
	h1.heading {
    font-size: 24px;
    padding: 0px 0px 7px 19px !important;
    color: #fff;
}
select {
    width: 100% !important;
}
</style>
<div class="container">
<div class="row">
   <div class="col-md-12">
      <div class="box">
         <div class="box-header with-border">
            <div class="col-lg-7 btn-class">
               <a href="<?php echo base_url(); ?>Admin/formdatalist" class="btn btn-flat" style="background-color: #e91e63; color: #fff;"><span class="fa fa-plus-circle" ></span> Go Back </a>&nbsp;
            </div>
            <div class="col-lg-5">
               <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
               <?php if ($ms){?>
               <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="icon fa fa-check"></i><?php echo $ms ;?>
               </div>
               <?php }?>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <form role="form" method="post" action="<?php echo base_url('Admin/editsubmitform'); ?>">
               <input type="hidden" name="campaign" value="<?php echo $this->uri->segment(4); ?>">
              <input type="hidden" name="lead_id" value="<?php echo $this->uri->segment(5); ?>">
              <div class="box-body">
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Phone Number *</label>
                     <input type="number" required="" name="phone_number" class="form-control" id="exampleInputEmail1" readonly="" placeholder="Enter Phone Number" value="<?php echo base64_decode($this->uri->segment(3)); ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Full Name *</label>
                     <input type="text" required="" name="full_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" value="<?php echo $form_data->full_name; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">City *</label>
                     <input type="text" required="" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter City" value="<?php echo $form_data->city; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">State *</label>
                     <input type="text" required="" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State" value="<?php echo $form_data->state; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Zip Code *</label>
                     <input type="text" required="" name="zip_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Zip Code" value="<?php echo $form_data->zip_code; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Email ID *</label>
                     <input type="email" required="" name="email_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Email ID" value="<?php echo $form_data->email_id; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Lead ID</label>
                     <input type="text"  name="leadid" class="form-control" id="exampleInputEmail1" placeholder="Enter Lead ID" value="<?php echo $form_data->leadid; ?>">
                 </div>
               </div>
              
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Loan Amount *</label>
                     <input type="number" required="" name="loan_amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Loan Amount" value="<?php echo $form_data->loan_amount; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Property Value *</label>
                     <input type="number" required="" name="property_value" class="form-control" id="exampleInputEmail1" placeholder="Enter Property Value" value="<?php echo $form_data->property_value; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Interest Rate *</label>
                     <input type="text" required="" name="interest_rate" class="form-control" id="exampleInputEmail1" placeholder="Enter Interest Rate" value="<?php echo $form_data->interest_rate; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Cash Out</label>
                     <input type="text" name="cash_out" class="form-control" id="exampleInputEmail1" placeholder="Enter Cash Out" value="<?php echo $form_data->cash_out; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Monthly Income *</label>
                     <input type="text" required="" name="monthly_income" class="form-control" id="exampleInputEmail1" placeholder="Enter Monthly Income" value="<?php echo $form_data->monthly_income; ?>">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Credit Rating *</label>
                     <select required="" name="credit_rating" class="form-control">
                        <option value="">Select Credit Rating</option>
                        <option value="Excellent" <?php if($form_data->credit_rating == "Excellent") echo "selected"; ?>>Excellent</option>
                        <option value="Good" <?php if($form_data->credit_rating == "Good") echo "selected"; ?>>Good</option>
                        <option value="Fair" <?php if($form_data->credit_rating == "Fair") echo "selected"; ?>>Fair</option>
                        <option value="Poor" <?php if($form_data->credit_rating == "Poor") echo "selected"; ?>>Poor</option>
                     </select>
                 </div>
               </div>
               <div class="col-md-8">
                <div class="form-group">
                     <label for="exampleInputEmail1">Agent Comments *</label>
                     <input type="text" required="" name="agent_comments" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Comments" value="<?php echo $form_data->agent_comments; ?>">
                 </div>
               </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php $this->load->view('admin/userpage/components/footer'); ?>
