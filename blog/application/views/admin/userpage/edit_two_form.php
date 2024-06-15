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
                     <label for="exampleInputEmail1">Total Debt Amount *</label>
                     <input type="text" required="" name="total_debt_amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Total Debt Amount" value="<?php echo $form_data->total_debt_amount; ?>">
                 </div>
               </div>
             
                <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">TAX Debt</label>
                     <select required name="tax_debt" class="form-control">
                        <option value="">Select TAX Debt</option>
                        <option value="Credit Card" <?php if($form_data->tax_debt == "Credit Card") echo "selected"; ?>>Credit Card</option>
                        <option value="Medical Bills" <?php if($form_data->tax_debt == "Medical Bills") echo "selected"; ?>>Medical Bills</option>
                        <option value="Personal Loans" <?php if($form_data->tax_debt == "Personal Loans") echo "selected"; ?>>Personal Loans</option>
                        <option value="Payday Loans" <?php if($form_data->tax_debt == "Payday Loans") echo "selected"; ?>>Payday Loans</option>
                        <option value="Student Loan" <?php if($form_data->tax_debt == "Student Loan") echo "selected"; ?>>Student Loan</option>
                        <option value="Tax Debt" <?php if($form_data->tax_debt == "Tax Debt") echo "selected"; ?>>Tax Debt</option>
                     </select>
                 </div>
               </div>

               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Debt Type 1*</label>
                     <select required="" name="debt_type_1" class="form-control">
                        <option value="">Select Debt Type</option>
                        <option value="Credit Card" <?php if($form_data->debt_type_1 == "Credit Card") echo "selected"; ?>>Credit Card</option>
                        <option value="Medical Bills" <?php if($form_data->debt_type_1 == "Medical Bills") echo "selected"; ?>>Medical Bills</option>
                        <option value="Personal Loans" <?php if($form_data->debt_type_1 == "Personal Loans") echo "selected"; ?>>Personal Loans</option>
                        <option value="Payday Loans" <?php if($form_data->debt_type_1 == "Payday Loans") echo "selected"; ?>>Payday Loans</option>
                        <option value="Student Loan" <?php if($form_data->debt_type_1 == "Student Loan") echo "selected"; ?>>Student Loan</option>
                        <option value="Tax Debt" <?php if($form_data->debt_type_1 == "Tax Debt") echo "selected"; ?>>Tax Debt</option>
                     </select>
                 </div>
               </div>
                <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Debt Type 2</label>
                     <select name="debt_type_2" class="form-control">
                        <option value="">Select Debt Type</option>
                        <option value="Credit Card" <?php if($form_data->debt_type_2 == "Credit Card") echo "selected"; ?>>Credit Card</option>
                        <option value="Medical Bills" <?php if($form_data->debt_type_2 == "Medical Bills") echo "selected"; ?>>Medical Bills</option>
                        <option value="Personal Loans" <?php if($form_data->debt_type_2 == "Personal Loans") echo "selected"; ?>>Personal Loans</option>
                        <option value="Payday Loans" <?php if($form_data->debt_type_2 == "Payday Loans") echo "selected"; ?>>Payday Loans</option>
                        <option value="Student Loan" <?php if($form_data->debt_type_2 == "Student Loan") echo "selected"; ?>>Student Loan</option>
                        <option value="Tax Debt" <?php if($form_data->debt_type_2 == "Tax Debt") echo "selected"; ?>>Tax Debt</option>
                     </select>
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
