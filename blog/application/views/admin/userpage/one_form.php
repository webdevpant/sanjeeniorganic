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
               <a href="<?php echo base_url(); ?>Admin/checkNumber" class="btn btn-flat" style="background-color: #e91e63; color: #fff;"><span class="fa fa-plus-circle" ></span> Go Back </a>&nbsp;
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
            <form role="form" method="post" action="<?php echo base_url('Admin/submitform'); ?>">
               <input type="hidden" name="campaign" value="<?php echo $this->uri->segment(4); ?>">
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
                     <input type="text" required="" name="full_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">City *</label>
                     <input type="text" required="" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter City">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">State *</label>
                     <input type="text" required="" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Zip Code *</label>
                     <input type="text" required="" name="zip_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Zip Code">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Email ID *</label>
                     <input type="email" required="" name="email_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Email ID">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Lead ID</label>
                     <input type="text"  name="leadid" class="form-control" id="exampleInputEmail1" placeholder="Enter Lead ID">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Total Debt Amount *</label>
                     <input type="text" required="" name="total_debt_amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Total Debt Amount">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Debt Type 1*</label>
                     <select required="" name="debt_type_1" class="form-control">
                        <option value="">Select Debt Type</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Medical Bills">Medical Bills</option>
                        <option value="Personal Loans">Personal Loans</option>
                        <option value="Payday Loans">Payday Loans</option>
                        <option value="Student Loan">Student Loan</option>
                        <option value="Tax Debt">Tax Debt</option>
                     </select>
                 </div>
               </div>
                <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Debt Type 2</label>
                     <select name="debt_type_2" class="form-control">
                        <option value="">Select Debt Type</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Medical Bills">Medical Bills</option>
                        <option value="Personal Loans">Personal Loans</option>
                        <option value="Payday Loans">Payday Loans</option>
                        <option value="Student Loan">Student Loan</option>
                        <option value="Tax Debt">Tax Debt</option>
                     </select>
                 </div>
               </div>
                <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Debt Type 3</label>
                     <select name="debt_type_3" class="form-control">
                        <option value="">Select Debt Type</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Medical Bills">Medical Bills</option>
                        <option value="Personal Loans">Personal Loans</option>
                        <option value="Payday Loans">Payday Loans</option>
                        <option value="Student Loan">Student Loan</option>
                        <option value="Tax Debt">Tax Debt</option>
                     </select>
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Monthly Income *</label>
                     <input type="text" required="" name="monthly_income" class="form-control" id="exampleInputEmail1" placeholder="Enter Monthly Income">
                 </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                     <label for="exampleInputEmail1">Credit Rating *</label>
                     <select required="" name="credit_rating" class="form-control">
                        <option value="">Select Credit Rating</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                     </select>
                 </div>
               </div>
               <div class="col-md-8">
                <div class="form-group">
                     <label for="exampleInputEmail1">Agent Comments *</label>
                     <input type="text" required="" name="agent_comments" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Comments">
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
