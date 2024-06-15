<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __Construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->model('Site_Model');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size:14px;font-style: italic;margin-top:5px;margin-bottom:20px;">', '</div>');
	}
	public function index()
	{
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/login',$data);
	}
	public function adminlogin()
	{
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/login',$data);
	}
	public function checkSession()
	{
		$admin_session=$this->session->userdata('login-in');
		if (!isset($admin_session)) {
			redirect(base_url()."Admin");
		}
	}
	public function httpPost($url,$params)
	{
	  $postData = '';
	   //create name value pairs seperated by &
	   foreach($params as $k => $v) 
	   { 
		  $postData .= $k . '='.$v.'&'; 
	   }
	   
	   $postData = rtrim($postData, '&');
	 
		$ch = curl_init();  
	 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POST, strlen($postData));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
	 
		$output=curl_exec($ch);
	 
		curl_close($ch);
		return $output;
	 
	}
	public function admin_login()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		}else{
			$userDbpass=$this->Admin_Model->getAdminDetail();
			if ($userDbpass) {
				$adminDbpassword=$userDbpass->password;
				$enterPassword=md5($this->input->post('password'));
				if ($adminDbpassword==$enterPassword) {
					$admin_session=array(
						'id'=>$userDbpass->id,
						'admin_name' => $userDbpass->first_name.' '.$userDbpass->last_name,
						'admin_email' => $userDbpass->email,
						'user_type' => $userDbpass->user_type,
						'admin_status'=>1
					);
					$this->session->set_userdata('login-in',$admin_session);
					$sess_data=$this->session->userdata('login-in');


					$admin_session=$this->session->userdata('login-in');
				 	$this->db->set('agent_id',$admin_session['id']);
				 	$this->db->set('agent_type',$admin_session['user_type']);
				 	$this->db->set('login_time',date('d-m-Y H:i:s'));
				 	$this->db->set('date',date('d-m-Y'));
				 	$this->db->set('status',1);
				 	$this->db->insert('lb_logins');
				 	redirect(base_url()."Admin/dashboard");
				}else{
					$data['error_message']="Your Password is incorrect";
					$this->load->view('admin/login',$data);
				}
			}else{
				$data['error_message']="Email Account Doesn't Exist";
				$this->load->view('admin/login',$data);
			}
		}
	}
	
	public function logout()
	{
		
		$admin_session=$this->session->userdata('login-in'); 
	 	$this->db->set('logout_time',date('d-m-Y H:i:s'));
	 	$this->db->where('agent_id',$admin_session['id']);
	 	$this->db->where('date',date('d-m-Y'));
	 	$this->db->where('status',1);
	 	$this->db->update('lb_logins');

		$this->session->set_userdata('login-in');
		$this->session->sess_destroy();
		//redirect(base_url()."Admin");
		redirect(base_url()."AdminLogin");
	}
	public function dashboard()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/maindashboard',$data);
	}
	
	function do_upload($fileName,$path)
	{
		$this->checkSession();
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'gif|jpg|png|pdf|svg|jpeg|webp';
	//	$config['max_size']	= '2000*********';
	//	$config['max_width']  = '160';
	//	$config['max_height']  = '190';
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($fileName))
		{
			return $error = array('error' => $this->upload->display_errors(),'upload_data' => "");
		}
		else
		{
			return $data = array('upload_data' => $this->upload->data(),'error' =>"");
		}
	}
	public function addProduct()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/category/add_product',$data);
	}
	

	public function downloadDb()
	{
		$this->load->dbutil();
		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => 'classified.sql'
		    );
		@$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'Virtual Event Landing-db-backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'uploads/databasebackup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup);
	}

	public function downloadDbManual()
	{
		$this->checkSession();
		$this->load->dbutil();
		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => 'classified.sql'
		    );


		@$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'Virtual Event Landing-db-backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'uploads/databasebackup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup);

		$this->load->helper('download');
		force_download($db_name, $backup);


	    $admin_session=$this->session->userdata('login-in'); 
		$customerData ="";
		$userdata = $this->Admin_Model->getEmployeeDataForMailDatabase($admin_session['id']);
		$customerData .= "Name : ".$userdata->first_name." ".$userdata->last_name."<br>";
		$customerData .= "Phone : ".$userdata->phone."<br>";
		$customerData .= "Email : ".$userdata->email."<br>";
		$customerData .= "Address : ".$userdata->address."<br>";
		
		$MailBody =  mailerHtml($customerData);
		$subjectData = "Virtual Event Landing Database Downloading...";
	    $mailSender = $this->sendEmail($tomail,$subjectData, $MailBody);
	
		redirect(base_url('Admin/dashboard'));
	}

	////////////////////////////////////Manu//////////////////////////////
	public function menu_management()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		$data['menus']=$this->Admin_Model->get_all_menus();
		$data['role_data']=$this->Admin_Model->get_all_role();
		//$data['main_content']='admin_files/admin_menu';
		$this->load->view('admin/menu/menu',$data);
	}


	public function add_menu()
	{
		$this->checkSession();
		$this->Admin_Model->add_menu();
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function edit_menu_page($menuid)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		$data['menus']=$this->Admin_Model->get_menu_byid($menuid);
		$data['menuslist']=$this->Admin_Model->get_all_menus();
		$data['role_data']=$this->Admin_Model->get_all_role();
		$data['menu_list']='menu_management';
		$this->load->view('admin/menu/edit_menu',$data);

	}

	public function edit_menu()
	{
		$this->checkSession();
		$this->Admin_Model->edit_menu($_POST);
	}

	public function delete_menu()
	{
		$this->checkSession();
		$data=$this->Admin_Model->delete_menu($_POST);
		if($data){
	 		echo json_encode("Menu deleated Successfully");
	 	}else{
	 		echo json_encode("Menu deletion Failed");
	 	}
	}
	////////////////////////////////End Menu//////////////////////////
	///////////////////////////////Emp User Managment/////////////////////



////////////////////  Function to show user list ///////////////////////////////////

	public function show_user_list()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['users_list']=$this->Admin_Model->show_user_list();
		$this->load->view('admin/users/userlist',$data);
	}
	////////////////////  Function to show add user page ///////////////////////////////////

	public function show_add_user()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['user_type_list']=$this->Admin_Model->get_user_type_new();
		$this->load->view('admin/users/adduser',$data);
	}
	////////////////////  Function to add user ///////////////////////////////////

	public function add_user()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->add_user($_POST);
	}
	////////////////////  Function to show edit user ///////////////////////////////////
	public function show_edit_user($user_id)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data["user_specific_data"]=$this->Admin_Model->show_edit_user($user_id);
		$data["user_role"]=$this->Admin_Model->get_user_type_new();
		$data["title"]="Edit User";
		$this->load->view("admin/users/edituser",$data);
	}
	////////////////////  Function to edit user ///////////////////////////////////

	public function edit_user()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->edit_user($_POST);
	}

	///////////////////////  Function to  delete user  /////////////////////////////////////////////////

    public function deleteUsers()
    {
    	$this->checkSession();
    	$result=$this->Admin_Model->deleteUser($_POST);  
    	if($result){
    		echo json_encode("User Deleted successfully");
    	}else{
    		echo json_encode("User Deletion Failed");
    	}
    }
    ///////////////////////  Function to  Deactivate user status /////////////////////////////////////////////////

    public function DeactivateUser()
    {
    	$this->checkSession();
    	$result=$this->Admin_Model->DeactivateUser($_POST);
    	if($result){
    		echo json_encode("User Deactivated successfully");
    	}else{
    		echo json_encode("User Deactivated Failed");
    	}  	
    }
    ///////////////////////  Function to  Activate user status  /////////////////////////////////////////////////

    public function ActivateUser()
    {
    	$this->checkSession();
    	$result=$this->Admin_Model->ActivateUser($_POST);
    	if($result){
    		echo json_encode("User Activated successfully");
    	}else{
    		echo json_encode("User Activated Failed");
    	}  	
    }

  //   public function get_all_staff_member()
  //   {
		// $data['adminData']=getAdminDetails();
		// $data['users_list']=$this->Admin_Model->get_all_staff_member();
		// $data["title"]="All Users";
		// $this->load->view('admin/users/stafflist',$data);

  //   }
	//////////////////////////////End Emp User Managemnt//////////////////// 

    ///////////////////////////////////////////GROUP///////////////////////////////

    ////  Functiosn to show add employee group page ///////////////////////////////////

	public function show_add_employee_group_page()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['menu_data']=$this->Admin_Model->get_menu_for_permission();
		$data["title"]="Add Employee Group";
		$this->load->view('admin/group/add_employee_group',$data);
	}

	////////////////////  Function to add employee group  ///////////////////////////////////

	public function add_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->add_employee_group($_POST);
	}
	///////////////////// Funtion to show assign permission page /////////////////////////
	public function assign_group_permission_page()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_data']=$this->Admin_Model->assign_group_permission_page();
		$this->load->view('admin/group/assign_group_permision_page');
	}

	//////////////////// Function to manage employee group ///////////////////////////////////////

	public function show_manage_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_data']=$this->Admin_Model->get_all_employee_group();
		$data['title']="Admin_Model Group";
		$this->load->view('admin/group/manage_employee_group',$data);
	}
	//////////////////// function to edit employee group details ///////////////////////////////////
	public function show_employee_group_edit($employee_group_id)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_detail']=$this->Admin_Model->get_employee_group_specific($employee_group_id);
		$data['menu_data']=$this->Admin_Model->get_menu_for_permission();
		$data['exist_menu_of_group']=$this->Admin_Model->get_assigned_menu_of_group($employee_group_id);
		$data['title']="Group Edit";
		$this->load->view('admin/group/manage_employee_group_edit',$data);
	}
	////////////////// Function to edit employee group detail  //////////////////////////////////////////

	public function edit_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->edit_employee_group($_POST);
	}

	//////////////////  function to deactivate employee group  //////////////////////////////////////////

	public function DeactivateEmployeeGroup()
	{
		$this->checkSession();
    	$result=$this->Admin_Model->DeactivateEmployeeGroup($_POST);
    	if($result){
    		echo json_encode("Group Deactivated successfully");
    	}else{
    		echo json_encode("Group Deactivated Failed");
    	}
	}

	//////////////////  function to Activate employee group  //////////////////////////////////////////
	public function ActivateEmployeeGroup()
	{
		$this->checkSession();
			$result=$this->Admin_Model->ActivateEmployeeGroup($_POST);
			if($result){
				echo json_encode("Group Activated successfully");
			}else{
				echo json_encode("Group Activated Failed");
			}
	}
	//////////////////  function to show add employee page  //////////////////////////////////////////

	
	///////////////////////////////////  Function to Delete Employee  ////////////////////////////////////////////////////
	public function deleteEmployee()
	{
		$this->checkSession();
		$result=$this->Admin_Model->DeleteEmployee($_POST);
		if($result==TRUE){
			echo json_encode("Group Deleted Successfully");
		}else{
			echo json_encode("Group Deletion Failed");
		}
	}


	///////////////////////////  Function to assign groups to a particular groups ////////////////////////////////

	

	/////////////////////  Function to show assigned groups ///////////////////////////////////////////////////

	public function show_assigned_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['group_data']=$this->Admin_Model->get_all_employee_group();
		$data['title']="Assigned User Group";
		$this->load->view('admin/group/show_assigned_user',$data);
	}

	/////////////////////  Function to show assigned groups by id ///////////////////////////////////////////////////
	public function get_assigned_group_by_id()
	{
		$this->checkSession();
		$data=$this->Admin_Model->get_assigned_group_by_id($_POST);		
		if($data){
			echo  json_encode($data);
		}else{
			$data="notfound";
			echo  json_encode($data);
		}	
	}
	/////////////////////////////////////////End Group////////////////////////////////////



	/////////////////////////Login  User////////////////////////////////
	public function stafflogins()
	{
		$this->checkSession();
   		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/logins/logins-list',$data);
	}

	///////////////////////End Logins User/////////////////////////////
	/////////////////////////change password///////////////////////////
	public function changepassword()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/password/change-password',$data);
	}
	public function changepassworddata()
	{
		$this->checkSession();
		$this->form_validation->set_rules('pass','Password','trim|required|xss_clean|matches[co_pass]');
		$this->form_validation->set_rules('co_pass','Confirm Password','trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['adminData'] =getAdminDetails();
			$this->load->view('admin/password/change-password',$data);
		}
		else
		{
			$this->Admin_Model->changpass();
			$message = array('message'=>'<span class="text-success">Password Updated Successfully !!</span>');
			$this->session->set_userdata($message);
			redirect(base_url('Admin/changepassword'));
		}
	}
	/////////////////////////End change password///////////////////////////

	///////////////////////Forget Password /////////////////
	public function forgetPassword()
	{
	   $this->load->view('admin/forget_password');
	}
	public function submitForgetPassword()
	{
	    
	    $this->load->library('form_validation');
	    $this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size:13px;font-style: italic;margin-top:-5px;margin-bottom:10px;">', '</div>');
	    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
	    if($this->form_validation->run() == FALSE){
	        redirect(base_url('Admin/forgetPassword'));
	    }else{
	        $data['userEmail']=$this->Admin_Model->forgetPasswordEmail();
	        @$dbEmail=$data['userEmail']->email;
	        $enterEmail=$this->input->post('email');
	        if($dbEmail  == $enterEmail){
	            $to=$data['userEmail']->email;
	            $name=$data['userEmail']->first_name.' '.$data['userEmail']->last_name;
	            $user_id=$data['userEmail']->id;
	            $password = rand(99999,9999999999);
	            $mdPassword = md5($password);
	            
	     
	            $this->db->set("password",$mdPassword);
 			    $this->db->set("text_password",$password);
	            $this->db->where('id',$user_id);
	            $this->db->update('lb_admin');
	            
	           
    	        $message = '<p>Hello '.$name.',</p>';
    			$message .= '<p>Welcome to demo.in. Thanks for Reset Password Request </p>';
    			$message .= '<p>Username : '.$to.'</p>';
    			$message .= '<p>Password : '.$password.'</p>';
    			$message .= '<p> </p>';
    			$message .= '<p>It looks like you requested a new password </p>';

    			$body = mailerHtml($message);
    			
    			$subject = "Star Imaging : CRM Reset Password Request";
    			
    			$this->sendEmail($to, $subject, $body);
    			$message = array('message'=>'<span>We Send Your Password Your Email Address</span>');
			    $this->session->set_userdata($message);
			    redirect(base_url('Admin/forgetPassword')); 
	            
	        }else{
	            $message = array('message'=>'<span>We cannot find email address</span>');
			    $this->session->set_userdata($message);
			    redirect(base_url('Admin/forgetPassword')); 
	        }
	      }
	}

	///////////////////////end Forget password /////////////////

	////////////////////////////////////Blog category///////////////////////////////////////////
	function blogcategory()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$data['allElement']=$this->Admin_Model->bloggetAllCategory();
		$this->load->view('admin/blogcategory/category_list',$data);
	}

    function blogcategorystatus($catId,$status)
	{
		$this->checkSession();
		$this->db->set("category_status",$status);
		$this->db->where("category_id",$catId);
		$this->db->update("lb_blog_category_tb");
		
		$sessionData = array('message'  => '<span class="text-success">Category Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/blogcategory/'));
	}
 
	function blogdeletecategory($cat)
	{
		$this->checkSession();

		$this->db->set("category_status",3);
		$this->db->where("category_id",$cat);
		$this->db->update("lb_blog_category_tb");

		$sessionData = array('message'  => '<span class="text-success">Category Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url()."Admin/blogcategory");
	}
	
 
	function blogaddcategory()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view('admin/blogcategory/add_category',$data);
	}
	
	function blogaddcategorydata()
	{
		$this->checkSession();
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('category_parent', 'Category Parent', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('cate_desc', 'Category Desc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|xss_clean');
	
		if ($this->form_validation->run() == FALSE)
		{
			$data['adminData']=getAdminDetails();
			$this->load->view('admin/blogcategory/add_category',$data);
		}
		else
		{      
		   // print_r($_POST); die();
			$coverData = $this->do_upload('category_image','blog_category');
			$cover = $coverData['upload_data']['file_name'];

			$this->Admin_Model->blogaddcategry($cover);

			$sessionData = array('message'  => '<span class="text-success">Category Added Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect(base_url("Admin/blogcategory"));
		
		}
	}
	
	function blogeditcategory($catid)
	{
		$data['adminData']=getAdminDetails();
		$data['cat_info'] = $this->Admin_Model->bloggetCategory($catid);
		$this->load->view('admin/blogcategory/edit_category',$data);
	}
	
	function blogupdatecategory()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('category_parent', 'Category Parent', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('cate_desc', 'Category Desc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|xss_clean');
		
	
		if ($this->form_validation->run() == FALSE)
		{
			$data['cat_info'] = $this->Admin_Model->bloggetCategory($this->input->post('category_id'));
			$this->load->view('admin/blogcategory/edit_category',$data);
		}
		else
		{      
		
            
            if($_FILES['category_image']['size']>0)
			{
				$logoData = $this->do_upload('category_image','blog_category');
				$cover = $logoData["upload_data"]["file_name"];
			}
			else{
				$cover = NULL;
			}	
            
			$this->Admin_Model->blogupdateCategry($cover);

			$sessionData = array('message'  => '<span class="text-success">Category Updated Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect(base_url("admin/blogcategory"));
		
		}
	}
	////////////////////////////////////End category///////////////////////////////////
    //////////////////////////////////Blog Post///////////////////////////////////
    public function post()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		
		
        $config = array();
        $config["base_url"] = base_url()."Admin/post";
        $config["total_rows"] = $this->Admin_Model->getpostcount();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config['enable_query_strings'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['post_list'] = $this->Admin_Model->getpost($config["per_page"],$page);	
		$this->load->view('admin/post/post_list',$data);
	}
	public function addpost()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		$this->load->view('admin/post/add_post',$data);
	}
	public function postsubmit()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('post_title', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('post_description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('small_description','Small Description','trim|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|xss_clean');
		$this->form_validation->set_rules('post_tags', 'Product Tags', 'trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$data['adminData']=getAdminDetails();
			$this->load->view('admin/post/add_post',$data);
		}
		else
		{      
		    
		   // print_r($_POST);
			$coverData = $this->do_upload('post_image','post');
			$cover = $coverData['upload_data']['file_name'];

 			$post_id = $this->Admin_Model->addpost($cover);
 			$this->Admin_Model->addPostCategory($post_id);
			$sessionData = array('message'  => '<span class="text-success">Post Added Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect(base_url("Admin/post"));
		
		}
	}
		public function updateupoststatus($id,$status)
	{
		$id = base64_decode($id);
		
		$this->db->set("post_status",$status);
		$this->db->where("post_id",$id);
		$this->db->update("lb_blog_post");
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function deletepost($post)
	{
		$pd = base64_decode($post);
		
		 
		$this->db->where("post_id",$pd);
		$this->db->delete("lb_blog_post");
	
		$sessionData = array('message'  => '<span class="text-success">Post Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url()."Admin/post");
	}
	public function editpost($pid)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$id = base64_decode($pid);
		$data['post_info'] = $this->Admin_Model->getSinglePost($id);
		$this->load->view('admin/post/edit_post',$data);
	}
    
    public function updatepost()
	{
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('post_title', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('post_description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('small_description','Small Description','trim|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|xss_clean');
		$this->form_validation->set_rules('post_tags', 'Product Tags', 'trim|xss_clean');


		if ($this->form_validation->run() == FALSE)
		{
			$data['adminData']=getAdminDetails();

			$data['post_info'] = $this->Admin_Model->getSinglePost($this->input->post('post_id'));
		    $this->load->view('admin/post/edit_post',$data);
		}
		else
		{    
			if($_FILES['post_image']['size']>0)
			{
			$coverData = $this->do_upload('post_image','post');
			$cover = $coverData['upload_data']['file_name'];
			}
			else{
				$cover = NULL;
			}
			
			$this->Admin_Model->updatePost($cover);
			$this->Admin_Model->updatePostCategory();
			

			$sessionData = array('message'  => '<span class="text-success">Post Updated Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect(base_url("Admin/post"));
		
		}
	}

    
    ///////////////////////////////////End Blog Post/////////////////////////////
    
    public function add_image()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view("admin/uploads/add_images",$data);
	}
	public function submit_image()
	{       
		$this->load->library('upload');

		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		
		
 	
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			// $this->upload->initialize($this->set_upload_options());
 
			$config = array();
			$config['upload_path'] = 'uploads/post/';
			// $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$path = $_FILES['userfile']['name'][$i];
			$config['file_name'] = "staredu_".time().$_FILES['userfile']['name'];
			$this->upload->initialize($config);
		
			if ( ! $this->upload->do_upload()) {

				// return the error message and kill the script
				echo $this->upload->display_errors(); die();
 
		 
			}
			else
			{
			 
				$return_data = $this->upload->data();
			    $this->Admin_Model->insertProductImage($return_data['file_name']);
			}
			 

		 	
		}
		
		redirect("admin/add_image/");
		
	}

	function delete_photo($photoId)
	{
		$this->db->where("image_id",$photoId);
		$this->db->delete("lb_post_images");
		$sessionData = array('message'  => '<span class="text-success">Image Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);

		redirect($_SERVER['HTTP_REFERER']);
		
	}
    ///////////////////////////////////////End Product//////////////////////////////


    
    ////////////////////////Cat FAQ/////////////////////
	public function add_post_faq()
    {
		$data['adminData']=getAdminDetails();
		$this->load->view('admin/post/add_faq',$data);
    }
    public function editPostFaq()
    {
		$data['adminData']=getAdminDetails();
		$data['faq_edit']=$this->Admin_Model->getTestEditFaq(base64_decode($this->uri->segment(3)));
		$this->load->view('admin/post/edit_faq',$data);
    }
    public function addTestFaq()
	{
		$this->checkSession();
		$this->form_validation->set_rules('post_id', 'Test id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('faq_q', 'Faq Questions', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('faq_a', 'Faq Answers', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE)
		{
    		$sessionData = array('message'  => '<span class="text-success">Faq Not Added !!</span>');
			$this->session->set_userdata($sessionData);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{  
			$this->Admin_Model->addTestFAQPage();

			$sessionData = array('message'  => '<span class="text-success">Test Faq Added Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function updateTestFaq()
	{
		$this->checkSession();
		$this->form_validation->set_rules('post_faq_id', 'Faq id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('post_id', 'Test id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('faq_q', 'Faq Questions', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('faq_a', 'Faq Answers', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE)
		{
    		$sessionData = array('message'  => '<span class="text-success">Faq Not Updated !!</span>');
			$this->session->set_userdata($sessionData);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{  
			$this->Admin_Model->updateTestFAQPage();
			$sessionData = array('message'  => '<span class="text-success">Test Faq Updated Successfully !!</span>');
			$this->session->set_userdata($sessionData);
			redirect(base_url().'Admin/add_post_faq/'.str_replace('=','',base64_encode($this->input->post('post_id'))));
		}
	}
    public function deletePostfaq($id)
	{
	    $this->db->select("*");
		$this->db->where("post_faq_id",$id);
		$this->db->delete("lb_post_faq");
		$sessionData = array('message'  => '<span class="text-success alert alert-success">Faq Deleted Successfully.</span>');
		$this->session->set_userdata($sessionData);
    	redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function commentlist()
	{
	    $data['adminData']=getAdminDetails();
	    $data['commentlist']=$this->Admin_Model->commentlistshow();
		$this->load->view('admin/comment/comment_list',$data);
	}
     function commentstatus($catId,$status)
	{
		$this->checkSession();
		$this->db->set("status",$status);
		$this->db->where("id",$catId);
		$this->db->update("lb_blog_comment");
		
		$sessionData = array('message'  => '<span class="text-success">Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/commentlist/'));
	}
	
	
	/////// inquiry ////////////
	
	public function Inquiry_List()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['users_list']=$this->Admin_Model->getContactQuery();
		$this->load->view('admin/inquiry/inquiry_list',$data);
	}
	public function Delete_ContactQuery($id)
	{
	    $this->db->where('contact_id',$id);
	    $this->db->set('contact_status',0);
	    $this->db->update('lb_contact_query');
	    $sessionData = array('message'  => '<span class="text-success">Inquiry Delete Successfully !!</span>');
		$this->session->set_userdata($sessionData);
// 		header("Location:".base_url('Admin/commentlist/'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	
	////////// inquiry /////////////
	

    
}


