<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model{
	public function index()
	{
		
	}
	public function urlMaker($string)
	{
	    $string = utf8_encode($string);
		//$string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
		$string = preg_replace('/[^a-z0-9- ]/i', '', $string);
		$string = str_replace(' ', '-', $string);
		$string = trim($string, '-');
		$string = strtolower($string);
		if (empty($string)) {
		return 'n-a';
		}
		return $string.".html";
	}
	public function getAdminDetail()
	{
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('status',1);
		$query=$this->db->get('lb_admin');
		return $query->row();
	}
	

	
	///////////////////////////////Menu/////////////////////////////////
	public function get_all_menus()
	{
		$this->db->order_by('position','asc');
		$query=$this->db->get('lb_menu');
		if($query->num_rows() > 0){
		return $query->result();
		}
	}
	public function add_menu()
	{
		$menu_insert=array(
			'menu_name'=>$this->input->post('menu_name'),
			'parent_id'=>$this->input->post('parent_menu'),
			'position'=>$this->input->post('position'),
			'menu_link'=>$this->input->post('link')
		);
		$this->db->insert('lb_menu',$menu_insert);
		
		
	}
	public function get_all_role()
	{
		$query=$this->db->get("lb_user_types");
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return FALSE;
		}
	}
	function get_menu_byid($menuid)
	{
		$query=$this->db->get_where('lb_menu',array('menu_id'=>$menuid));
		if($query->num_rows()>0){
			 return $query->result();
		}
	}

	function edit_menu()
	{
		$menu_id=$this->input->post('menu_id');
		
		$data=array(
			'menu_name'=>$this->input->post('menu_name'),
			'menu_link'=>$this->input->post('menu_link'),
			'position'=>$this->input->post('position'),
			'parent_id'=>$this->input->post('parent_menu')			
			);
		
	    $this->db->update('lb_menu',$data,array('menu_id'=>$menu_id));
	    
           
            if($this->db->affected_rows()>=0){
			    echo "<script>alert('menu Upadated Successfully');</script>";
			    echo"<script>window.location.href='".base_url()."Admin/menu_management'</script>";
		    }else{
			    echo "<script>alert('Menu Upadation Failed');</script>";
			    echo"<script>window.location.href='".base_url()."Admin/menu_management'</script>";
		    }
	    }

	
	function delete_menu()
	{
		$menu_id=$this->input->post("menuId");
		$result=$this->db->delete("lb_menu", array('menu_id'=>$menu_id));
		if($result){
			
				return TRUE;
			}else{
				return FALSE;
			}
		}
	
	//////////////////////////////////End Menu///////////////////////////////


		////////////////////////Emp User //////////////////////////////////////

	public function show_user_list()
	{
		$session_data=$this->session->userdata('login-in');
		if ($session_data['user_type'] ==1) {
			$query=$this->db->query("select u.*,ut.user_name from lb_admin u left outer join lb_user_types ut on u.user_type=ut.id where u.user_type NOT IN(1) ");
			if($query->num_rows()>0){
              return $query->result();
			}
		} else {
			$query=$this->db->query("select u.*,ut.user_name from lb_admin u left outer join lb_user_types ut on u.user_type=ut.id where u.user_type NOT IN(1) And  u.user_type NOT IN(2)");
			if($query->num_rows()>0){
              return $query->result();
			}
		}
		
		
			
				
	}

	public function get_all_customer()
	{
		$query=$this->db->query("select * from lb_admin where user_type=3");
		if($query->num_rows()>0){
              return $query->result();
			}

	}
	public function get_all_supplier()
	{
		$query=$this->db->query("select * from lb_admin where user_type=2");
		if($query->num_rows()>0){
              return $query->result();
			}
	}

	public function show_add_user()
	{	
		$session_data=$this->session->userdata('login-in');
		$logged_user_type=$session_data['user_type'];
		if($logged_user_type==2){
			$query=$this->db->query("select * from lb_user_types where id!=1 and id!=3 and id!=2");
		}else{
			$query=$this->db->query("select * from lb_user_types where id!=1 and id!=3");
		}
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function add_user()
	{
		$first_name=trim($this->input->post('first_name'));
		$last_name=trim($this->input->post('last_name'));
		$email=trim($this->input->post('email'));
		$user_type=$this->input->post("user_type");
		$phone=trim($this->input->post('phone'));
		$gender=$this->input->post('gender');
		if($gender=="male"){$gender=1;}else{$gender=2;}
		$address=trim($this->input->post('address'));
		$dob=$this->input->post('dob');
		$dateofb=date("Y-m-d", strtotime($dob));
		$city=$this->input->post('city');
		$password1=trim($this->input->post('password'));
		//$password1=mt_rand(100000,999999);
		$password=md5($password1);
		$created_at=date("Y-m-d h:i:sa");
		$modified_at=date("Y-m-d h:i:sa");

		$data=array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'email'=>$email,
			'user_type'=>$user_type,
			'phone'=>$phone,
			'gender'=>$gender,
			'address'=>$address,
			'dob'=>$dateofb,
			'city'=>$city,
			'password'=>$password,
			'text_password' => $password1,
			'copyright'=>"Star Education",
			'copyright_url'=>"#",
			'logo_name_url'=>"Star Education",			
			'status'=>1,
			'created_at'=>$created_at,
			'modified_at'=>$modified_at
		);
		$check=$this->db->query('select * from lb_admin where email="'.$email.'"');
		if($check->num_rows()==0){
				$this->db->insert('lb_admin',$data);
				if($this->db->insert_id()>0){
		                echo '<script>alert("User Added Successfully");</script>';
		                echo "<script>window.location='".base_url()."Admin/show_user_list';</script>";					
				}else{
					echo '<script>alert("User Registeration Failed");</script>';
					echo "<script>window.loaction='".base_url()."Admin/show_add_user';</script>";
				}
		}else{
			echo '<script>alert("User already exists");</script>';
			echo  "<script>window.location='".base_url()."Admin/show_add_user'</script>";
		}				

	}

	

    public function show_edit_user($user_id)
    {
    	$query=$this->db->get_where("lb_admin",array('id'=>$user_id));
		if($query->num_rows()>0){
			return $query->row();
		}
    }

    public function get_user_type()
    {
    	$query=$this->db->query("select * from lb_user_types where id!=1");
    	if($query->num_rows()>0){
    		return $query->result();
    	}
    }

    public function get_user_type_new()
    {
    	$query=$this->db->query("select * from lb_user_types where id!=1");
    	if($query->num_rows()>0){
    		return $query->result();
    	}
    }

    public function edit_user()
    {
    	$user_id=$this->input->post('user_id');
		$first_name=trim($this->input->post('first_name'));
		$last_name=trim($this->input->post('last_name'));
		$email=trim($this->input->post('email'));
		$user_type=$this->input->post('user_type');

		$phone=trim($this->input->post('phone'));
		$gender=$this->input->post('gender');
		if($gender=="male"){$gender=1;}else{$gender=2;}
		$address=trim($this->input->post('address'));

		$data=array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'user_type'=>$user_type,
			'email'=>$email,
			'phone'=>$phone,
			'gender'=>$gender,
			'address'=>$address
		);		

		$this->db->update('lb_admin',$data,array('id'=>$user_id));
		if($this->db->affected_rows()>0){
			echo '<script>alert("User details updated successfully");</script>';
			echo "<script>window.location='".base_url()."Admin/show_user_list'</script>";
		}else{
			echo '<script>alert("No modification made");</script>';
			echo "<script>window.location='".base_url()."Admin/show_edit_user/".$user_id."'</script>";
		}
    }

    public function deleteUser()
    {
    	$UserId=$this->input->post('UserId');
    	$result=$this->db->delete('lb_admin',array('id'=>$UserId));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function DeactivateUser()
    {
    	$UserId=$this->input->post('UserId');
    	$data=array('status'=>0);
    	$result=$this->db->update('lb_admin',$data,array('id'=>$UserId));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function ActivateUser()
    {
    	$UserId=$this->input->post('UserId');
    	$data=array('status'=>1);
    	$result=$this->db->update('lb_admin',$data,array('id'=>$UserId));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function get_all_staff_member(){
    	$query=$this->db->query("select u.*,ut.user_name,role.role_id,staff.role_name
		from lb_admin u 
		left outer join lb_user_types ut on u.user_type=ut.id
		left outer join mvs_assigned_role role on u.id=role.member_id
		left outer join mvs_staff_role staff on role.role_id=staff.id
	    where u.user_type =2 ");
			if($query->num_rows()>0){
              return $query->result();
			}

    }


		///////////////////////End Emp User/////////////////////////////////////


    ////////////////////////////////Group /////////////////////////////////////////


    public function get_menu_for_permission()
	{
		$this->db->order_by("position", "asc");
		$query=$this->db->get("lb_menu");
		if($query->num_rows()>0){
			return $query->result();
		}

	}

	public function add_employee_group()
	{
		$created_at=date("Y-m-d h:i:sa");
		$modified_at=date("Y-m-d h:i:sa");
		$employee_group_name=$this->input->post('employee_group');
		$employee_group_permission_menu[]=$this->input->post('menu_id');
		// print_r($employee_group_permission_menu); die();
		$data=array(
			'user_name'=>$employee_group_name,
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:sa"),
			'modified_at'=>date("Y-m-d h:i:sa")
		);
		$this->db->insert("lb_user_types",$data);
		if($this->db->insert_id()>0){
				//$user_group_id=$this->db->insert_id();
				

				//$total_sub_menu=count($employee_group_permission_menu);
				for($i=0;$i<count($employee_group_permission_menu[0]);$i++){

					$role_id=$user_group_id;
					$menu_id=$employee_group_permission_menu[0][$i];
					$created_at=date("Y-m-d h:i:sa");
					$modified_at=date("Y-m-d h:i:sa");

					$data1=array(
						'user_type_id'=>$role_id,
						'menu_id'=>$menu_id,
						'status'=>1,
						'created_at'=>$created_at,
						'updated_at'=>$modified_at
					);
					$this->db->insert("lb_role_menu",$data1);

					
				}
				echo '<script>alert("Group inserted Successfully");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_add_employee_group_page';</script>";
		}else{
				echo '<script>alert("Group insertion Failed");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_add_employee_group_page';</script>";
		}

	}

	public function get_all_employee_group()
	{
		$query=$this->db->query("select * from lb_user_types where id!=1");
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function get_all_employee_department()
	{
		$query=$this->db->query("select * from b2b_department");
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function get_employee_group_specific($employee_group_id)
	{
		$query=$this->db->get_where('lb_user_types',array('id'=>$employee_group_id));
		if($employee_group_id){
			return $query->row();
		}
	}

	public function get_assigned_menu_of_group($employee_group_id)
	{
		// echo $employee_group_id; die();
		$query=$this->db->get_where('lb_role_menu',array('user_type_id'=>$employee_group_id));
			 // print_r($query->result()); die();
		
		if($query->num_rows()>0){
			 // print_r($query->result()); die();
			return $query->result();
		}
	}

	public function edit_employee_group()
	{

		//print_r($_POST);die();
		$employee_group_name=$this->input->post('employee_group');
		$employee_group_id=$this->input->post('employee_group_id');
		$employee_group_permission_menu[]=$this->input->post('menu');

		$data=array(
			'user_name'=>$employee_group_name,
			'status'=>1,
			'modified_at'=>date("Y-m-d h:i:sa")
		);
		$this->db->update("lb_user_types",$data,array('id'=>$employee_group_id));
		if($this->db->affected_rows()>0){
				$query=$this->db->get_where("lb_role_menu",array('user_type_id'=>$employee_group_id));
				if($query->num_rows()>0){
					$this->db->delete("lb_role_menu",array('user_type_id'=>$employee_group_id));
				}

				for($i=0;$i<count($employee_group_permission_menu[0]);$i++){

					$role_id=$employee_group_id;
					$menu_id=$employee_group_permission_menu[0][$i];
					$created_at=date("Y-m-d h:i:sa");
					$modified_at=date("Y-m-d h:i:sa");

					$data1=array(
						'user_type_id'=>$role_id,
						'menu_id'=>$menu_id,
						'status'=>1,
						'created_at'=>$created_at,
						'updated_at'=>$modified_at
					);
					$this->db->insert("lb_role_menu",$data1);
				}
				echo '<script>alert("Group updated Successfully");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_manage_employee_group';</script>";
		}else{
				echo '<script>alert("Group updation Failed");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_manage_employee_group';</script>";
		}
	}

	public function DeactivateEmployeeGroup()
	{
		$groupID=$this->input->post('employeegroupid');
    	$data=array('status'=>0);
    	$result=$this->db->update('lb_user_types',$data,array('id'=>$groupID));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ActivateEmployeeGroup()
	{
		$groupID=$this->input->post('employeegroupid');
    	$data=array('status'=>1);
    	$result=$this->db->update('lb_user_types',$data,array('id'=>$groupID));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
	}

	


	public function show_employee_page()
	{
		$sess_data=$this->session->userdata("admin_logged_in");
		$parent_role_id=$sess_data["user_type"];
		$query1=$this->db->query("select child_role_id from b2b_assign_users where parent_role_id='".$parent_role_id."' ");
		$arr=$query1->result_array();
		$newarray=array();
		$i=0;
		foreach($arr as $newarr){	
			foreach ($newarr as $key => $value) {
				$newarray[$i]=$value;
				$i++;
			}					
		}				
		$matches=implode(',',$newarray); 		
		if($matches){
			$query=$this->db->query("select u.*,e.*,ut.user_name from b2b_users u inner join b2b_employee e on u.employee_id=e.id left outer join lb_user_types ut on u.user_type=ut.id where  ut.id IN ( ".$matches." ) ");			
			if($query->num_rows()>0){				
				return $query->result();
			}
		}else{
			return "";
		}
	}

	

	public function DeleteEmployee()
	{
		$employee_id=$this->input->post("GroupId");
		$result=$this->db->delete("lb_user_types",array('id'=>$employee_id));
		if($result){
			
				return TRUE;
			}
			else{
				return FALSE;
			}
		
	}

	//////////////////////////// Function to assign Groups to another Group /////////////////////////////
	public function assign_user()
	{
		$parent_role_id=$this->input->post("parent_role_id");	
			$query1=$this->db->get_where('lb_user_types',array('id'=>$parent_role_id));
			$result1=$query1->row();
		$parent_role_name=$result1->user_name;			
		$child_role_id[]=$this->input->post("child_role_id");		
		
		$query=$this->db->get_where('b2b_assign_users',array('parent_role_id'=>$parent_role_id));
		if($query->num_rows()>0){
			$this->db->delete('b2b_assign_users',array('parent_role_id'=>$parent_role_id));
		}

		$length=count($child_role_id[0]);		
		for($i=0 ;$i<$length ;$i++){

			$query2=$this->db->get_where('lb_user_types',array('id'=>$child_role_id[0][$i]));
			$result2=$query2->row();
			$child_role_name=$result2->user_name;

			$data=array(
				'parent_role_id'=>$parent_role_id,
				'parent_role_name'=>$parent_role_name,
				'child_role_id'=>$child_role_id[0][$i],
				'child_role_name'=>$child_role_name,
				'status'=>1,
				'created_at'=>date("Y-m-d h:i:sa"),
				'updated_at'=>date("Y-m-d h:i:sa")
			);
			$this->db->insert('b2b_assign_users',$data);			
		}
			echo "<script>alert('Group Assigned to  $parent_role_name Group');</script>";
			echo "<script>window.location.href='".base_url()."Admin/show_assign_user';</script>";	
	}

	public function get_assigned_user_group()
	{
		$query=$this->db->get('b2b_assign_users');
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function get_assigned_group_by_id()
	{
		$parent_role_id=$this->input->post('parent_role_id');
		// echo $parent_role_id;
		$query=$this->db->get_where('b2b_assign_users',array('parent_role_id'=>$parent_role_id));
		if($query->num_rows()>0){
			 return $query->result();
		}
	}

	/////////////////////////////////////////End Group////////////////////////////////////
    ///////////////////Change password//////////////////////////
    public function changpass()
	{
		$admin_session=$this->session->userdata('login-in'); 
		$this->db->set("password",md5($this->input->post("pass")));
		$this->db->set("text_password",$this->input->post("pass"));
		$this->db->where("id",$admin_session['id']);
		$this->db->update("lb_admin");		
	}
    ////////////////////End Change Password ////////////////////


    ///////////////////////Forget Password///////////////////////
	public function forgetPasswordEmail()
	{
	    $this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$query = $this->db->get('lb_admin');
        return $query->row();
	}

    ///////////////////End Forget Password///////////////////////
	public function getContactQuery()
	{
		$this->db->select('*');
		$this->db->order_by('contact_id','desc');
		$this->db->where('contact_status',1);
		$getResult = $this->db->get('lb_contact_query');
		return $getResult->result(); 
	}
	
	

	public function getAllUserRegistered()
	{
		$this->db->select('*');
		$getResult = $this->db->get('lb_user_list');
        return $getResult->result(); 
	}
/////////////////////////////////////////////Site Setting/////////////////////////////////////
	public function updateSetting()
	{
		$this->db->set("contact_email",$this->input->post("contact_email"));
		$this->db->set("contact_phone",$this->input->post("contact_number"));
		$this->db->set("social_twitter",$this->input->post("twitter"));
		$this->db->set("social_facebook",$this->input->post("facebook"));
		$this->db->set("social_google",$this->input->post("google"));
		$this->db->set("social_instagram",$this->input->post("instagram"));
		
		$this->db->set("social_linkedin",$this->input->post("linkedin"));
		$this->db->set("social_youtube",$this->input->post("youtube"));
		$this->db->set("whatsapp_api",$this->input->post("whatsapp_api"));
		$this->db->set("ga_code",$this->input->post("ga_code"));
		$this->db->set("live_chat",$this->input->post("live_chat"));
		$this->db->set("contact_address",$this->input->post("contact_address"));
		$this->db->set("whatsapp_api_number",$this->input->post("whatsapp_api_number"));
		$this->db->where("setting_id",1);
		
		$this->db->update("lb_site_setting");
	}
	
	public function getSetting()
	{
		$this->db->select("*");
		$this->db->where("setting_id",1);
		return $this->db->get("lb_site_setting")->row();
	}
    ////////////////////////////////////////////End Site Setting/////////////////////////////////////
    public function  getFildsName($id)
    {
    	$this->db->select('*');
		$this->db->where("form_id",$id);
		return $this->db->get("lb_form_fields")->result();
    }
    public function getMobileUserForCheck($no)
    {
    	$this->db->select('*');
		$this->db->where("phone_number",$no);
		return $this->db->get("lb_client_data")->row();
    }
    public function getAllLeadDataByMobileNumber($no)
    {
    	$this->db->select('*');
		$this->db->where("phone_number",$no);
		return $this->db->get("lb_client_data")->result();
    }
    public function getCampaignData()
    {
    	$this->db->select('*');
		$this->db->where("campaign_status",1);
		return $this->db->get("campaign")->result();
    }
    public function getCampaignDataforShow($id)
    {
    	$this->db->select('*');
		$this->db->where("campaign_id",$id);
		return $this->db->get("campaign")->row();
    }
    public function form_submit()
    {
    	extract($_POST);
    	// echo "<pre>";
    	// print_r($_POST); die;
    	$session_data=$this->session->userdata('login-in');
    	@$data=array(
			 'phone_number'=>$phone_number,
			 'full_name'=>$full_name,
			 'city'=>$city,
			 'state'=>$state,
			 'zip_code'=>$zip_code,
			 'email_id'=>$email_id,
			 'leadid'=>$leadid,
			 'total_debt_amount'=>$total_debt_amount,
			 'tax_debt'=>$tax_debt,
			 'loan_amount'=>$loan_amount,
			 'property_value'=>$property_value,
			 'interest_rate'=>$interest_rate,
			 'cash_out'=>$cash_out,
			 'debt_type_1'=>$debt_type_1,
			 'debt_type_2'=>$debt_type_2,
			 'debt_type_3'=>$debt_type_3,
			 'monthly_income'=>$monthly_income,
			 'credit_rating'=>$credit_rating,
			 'agent_name'=>$session_data['admin_name'],
			 'agent_id'=>$session_data['id'],
			 'agent_comments'=>$agent_comments,
			 'campaign'=>$campaign,
		);
		$this->db->insert('lb_form_date',$data);
		$dataids=$this->db->insert_id();

		$data=array(
			'date'=>date("Y-m-d"),
			'name'=>$full_name,
			'phone_number'=>$phone_number,
			'campaign'=>$campaign,
			'agent_name'=>$session_data['admin_name'],
			'agent_id'=>$session_data['id'],
			'remark_status'=>$agent_comments,
			'comment'=>$agent_comments,
			'form_data_id'=>$dataids
		);
		$this->db->insert('lb_client_data',$data);
    }
    public function editform_submit()
    {
    	extract($_POST);
    	$session_data=$this->session->userdata('login-in');
    	@$data=array(
			 'phone_number'=>$phone_number,
			 'full_name'=>$full_name,
			 'city'=>$city,
			 'state'=>$state,
			 'zip_code'=>$zip_code,
			 'email_id'=>$email_id,
			 'leadid'=>$leadid,
			 'total_debt_amount'=>$total_debt_amount,
			 'tax_debt'=>$tax_debt,
			 'loan_amount'=>$loan_amount,
			 'property_value'=>$property_value,
			 'interest_rate'=>$interest_rate,
			 'cash_out'=>$cash_out,
			 'debt_type_1'=>$debt_type_1,
			 'debt_type_2'=>$debt_type_2,
			 'debt_type_3'=>$debt_type_3,
			 'monthly_income'=>$monthly_income,
			 'credit_rating'=>$credit_rating,
			 'agent_comments'=>$agent_comments,
			 'campaign'=>$campaign,
		);
    	$this->db->where('lead_id',$this->input->post('lead_id'));
		$this->db->update('lb_form_date',$data);
		$dataids=$this->db->insert_id();

		$data=array(
			'date'=>date("Y-m-d"),
			'name'=>$full_name,
			'remark_status'=>$agent_comments,
			'comment'=>$agent_comments,
			'form_data_id'=>$dataids
		);
		$this->db->where('phone_number',$phone_number);
		$this->db->where('campaign',$campaign);
		$this->db->update('lb_client_data',$data);
    }
    public function getStateList()
    {
    	$this->db->select('*');
    	$this->db->where('state_status',1);
    	return $this->db->get('lb_state')->result();
    }
    public function getStateDataforShow($id)
    {
    	$this->db->select('*');
    	$this->db->where('state_id',$id);
    	return $this->db->get('lb_state')->row();
    }
    public function getFormDataList()
    {
    	$this->db->select('*');
    	$this->db->where('company_status !=',3);
    	return $this->db->get('lb_user_list')->result();
    }
    public function getExportdata()
    {
    	$date1 = date('Y-m-d 01:00:00', strtotime($this->input->post('fromdate')));
		$date2 = date('Y-m-d 24:00:00', strtotime($this->input->post('todate')));
 	  	$date3 = date('Y-m-d h:i:s', strtotime($date1));
 		$date4 = date('Y-m-d h:i:s', strtotime($date2));

 		
		$this->db->select('*');
		
		if(!empty($this->input->post('campaign')))
		{
			$camArray=$this->input->post('campaign');
			foreach ($camArray as $key => $value) {
				$campaign[]=$value;
			}
		   $campaigns=array_unique($campaign);
		   $this->db->where_in('campaign',$campaigns); 
		}
		$this->db->where('company_created >',$date3);
		$this->db->where('company_created <',$date4);
		$this->db->where('company_status !=',3);
		return $this->db->get('lb_user_list')->result();
    }
   
     /////////////////////////////////////////////////blog Category///////////////////////////////

	function bloggetCategory($id)
	{
		$this->db->select('*');
		 
		$this->db->where('category_id',$id);
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->row(); 
	}
	
	
	function blogaddcategry($cover)
	{
		$date = date('Y-m-d h:i:s');
		$this->db->set('category_name',$this->input->post("category_name"));
		$this->db->set('category_url',$this->urlMaker($this->input->post("category_name")));
		$this->db->set('category_article',$this->input->post("category_article"));	
		$this->db->set('category_parent_id',$this->input->post("category_parent"));	
		$this->db->set('meta_title',$this->input->post("meta_title"));	
		$this->db->set('meta_desc',$this->input->post("meta_description"));	
		$this->db->set('meta_keyword',$this->input->post("meta_keyword"));	
		
		
		$this->db->set('category_image',$cover);	
		$this->db->set('category_created',$date);	
		$this->db->set('category_updated',$date);	
		$this->db->set('category_menu_active',$this->input->post("menu_status"));	
		$this->db->set('category_status',$this->input->post("category_status"));	
		$this->db->insert('lb_blog_category_tb');
        
	}		

	function blogupdateCategry($cover=NULL)
	{
		$date = date('Y-m-d h:i:s');
		$this->db->set('category_name',$this->input->post("category_name"));
		$this->db->set('category_url',$this->input->post("category_url"));
		//$this->db->set('category_desc',$this->input->post("cate_desc"));	
		$this->db->set('category_parent_id',$this->input->post("category_parent"));	
		
		$this->db->set('meta_title',$this->input->post("meta_title"));	
		$this->db->set('meta_desc',$this->input->post("meta_description"));	
		$this->db->set('meta_keyword',$this->input->post("meta_keyword"));	
		
		if($cover!=NULL){
			
			$this->db->set('category_image',$cover);
		}
		
		$this->db->set('category_created',$date);	
		$this->db->set('category_updated',$date);	
		$this->db->set('category_menu_active',$this->input->post("menu_status"));	
		$this->db->set('category_status',$this->input->post("category_status"));	
		$this->db->where('category_id',$this->input->post('category_id'));
		$this->db->update('lb_blog_category_tb');
        
	}	
	function bloggetAllCategory()
	{
		$this->db->select('*');
		$this->db->where('category_status !=',3);
		
	    $uri=$this->uri->segment(3);
	    if(!empty($uri)){
	        	$this->db->where('category_parent_id',$uri);
	    }
		$this->db->order_by('category_id',"desc");
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->result(); 
	}	
	function bloggetActiveCategory($parent=0)
	{
		$this->db->select('*');
		$this->db->order_by('category_id',"desc");
		$this->db->where('category_parent_id',$parent);
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->result(); 
	}
	function bloggetActiveTestCategory($parent=0)
	{
		$this->db->select('*');
		$this->db->order_by('category_id',"desc");
		$this->db->where('category_parent_id',$parent);
		$this->db->where('category_status',1);
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->result(); 
	}
	
	public function bloggetTestCategoryForAddTestInLab()
	{
		$this->db->select('*');
		$this->db->where('category_status',1);
		$this->db->order_by('category_id',"desc");
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->result(); 
	}
	function bloggetProductCategory($test_id)
	{
		$this->db->select('cat_id');
		$this->db->where('test_id',$test_id);
		return $this->db->get('lb_blog_category_tb')->result();
	}
	public function bloggetCatName($cat_id)
	{
		$this->db->select("*");
		$this->db->where("category_id",$cat_id);
		$query = $this->db->get('lb_blog_category_tb');
		return $query->row();
	}
    public function bloggetActiveProductCategory($parent=0)
	{
		$this->db->select('*');
		$this->db->order_by('category_id',"desc");
		$this->db->where('category_parent_id',$parent);
		$this->db->where('category_status',1);
		$getResult = $this->db->get('lb_blog_category_tb');
        return $getResult->result(); 
	}
	/////////////////////////////////////////////End Blog Category//////////////////////////////
    //////////////////////Blog Post//////////////////
    public function getpostcount()
	{
	    $search=$this->input->get('post_name');
		$this->db->select('*');
		if($search != null){
		    $this->db->like('post_title',$search);
		}
		$this->db->order_by('post_id','desc');
		$getResult = $this->db->get('lb_blog_post');
        return $getResult->num_rows(); 
	}
	public function getpost($limit,$page)
	{
		 $search=$this->input->get('post_name');
		$this->db->select('*');
		if($search != null){
		    $this->db->like('post_title',$search);
		}
		$this->db->order_by('post_id','desc');
		$this->db->limit($limit,$page);
		$getResult = $this->db->get('lb_blog_post');
        return $getResult->result(); 
	}
	
	public function addpost($img)
	{
		$date = date('Y-m-d h:i:s');
		$this->db->set('post_title',$this->input->post("post_title"));
		$producturl=$this->input->post("post_title");
		$this->db->set('post_url',$this->urlMaker($producturl));
		$this->db->set('post_description',$this->input->post("post_description"));	

		$this->db->set('small_description',$this->input->post("small_description"));	
		$this->db->set('meta_title',$this->input->post("meta_title"));	
		$this->db->set('meta_desc',$this->input->post("meta_description"));	
		$this->db->set('meta_keyword',$this->input->post("meta_keyword"));	
		$this->db->set('post_tags',$this->input->post("post_tags"));	
	
		$this->db->set('post_img',$img);
		$this->db->set('post_created',$this->input->post('post_created'));	
		$this->db->set('post_created_at',$date);	
		$this->db->set('post_updated',$date);	
 
		$this->db->insert('lb_blog_post');
		
		return $this->db->insert_id();
        
	}
	public function addPostCategory($post_id)
	{
		$cat_list = $this->input->post("post_cat");
		
		if(count($cat_list) && $post_id!=NULL){
			 
			//	$this->db->where('prod_id',$product_id);
			//	$this->db->delete('category_products');
				
			foreach($cat_list as $cat_id){
				$this->db->set('cat_id',$cat_id);
				$this->db->set('prod_id',$post_id);
				$this->db->insert('lb_blog_category_post');
			}
		} 
	}
	public	function getCatNameForPost($post_id)
	{

		$this->db->select('*');
		$this->db->where('prod_id',$post_id);
		$catid=$this->db->get('lb_blog_category_post')->result();
		
		if (!empty($catid)){
				foreach ($catid as $key => $value) {
					$cats_id[] = $value->cat_id;
				}
				$catsid= array_unique($cats_id);

				$this->db->select("category_name");
				$this->db->where_in("category_id",$catsid);
				$query = $this->db->get('lb_blog_category_tb');
				return $query->result();
		}else{
			return false;
		}
	}
	public	function getSinglePost($id)
	{
		$this->db->select('*');
		$this->db->where('post_id',$id);
		$getResult = $this->db->get('lb_blog_post');
        return $getResult->row(); 
	}
	public function getPostCategorys($post_id)
	{
		$this->db->select('cat_id');
		$this->db->where('prod_id',$post_id);
		return $this->db->get('lb_blog_category_post')->result();
	}
	
	public function updatePost($img=NULL)
	{
			$date = date('Y-m-d h:i:s');
		$this->db->set('post_title',$this->input->post("post_title"));
		$producturl=$this->input->post("post_title");
		$this->db->set('post_url',$this->input->post("post_url"));
		$this->db->set('post_description',$this->input->post("post_description"));	

		$this->db->set('small_description',$this->input->post("small_description"));	
		$this->db->set('meta_title',$this->input->post("meta_title"));	
		$this->db->set('meta_desc',$this->input->post("meta_description"));	
		$this->db->set('meta_keyword',$this->input->post("meta_keyword"));	
		$this->db->set('post_tags',$this->input->post("post_tags"));	
	
		$this->db->set('post_created',$this->input->post('post_created'));
		$this->db->set('post_updated',$date);	
 
		
		if($img!=NULL)
		{
	    	$this->db->set('post_img',$img);	
		}

		$this->db->where('post_id',$this->input->post('post_id'));	
		$this->db->update('lb_blog_post');
        
	}
	public function updatePostCategory()
	{
		
		$product_id = $this->input->post("post_id");
		$cat_list = $this->input->post("post_cat");
		
		if(count($cat_list)){
			
				 
				$this->db->where('prod_id',$product_id);
				$this->db->delete('lb_blog_category_post');
				
			foreach($cat_list as $cat_id){
				
				$this->db->set('cat_id',$cat_id);
				$this->db->set('prod_id',$product_id);
				$this->db->insert('lb_blog_category_post');
		 
			}
		}
		 
	}
    
    ///////////////////////End Blog Post////////////////
    public function getProductPhoto()
	{
		$this->db->select('*');
		$getResult = $this->db->get('lb_post_images');
        return $getResult->result(); 
	}	
    public function insertProductImage($image)
	{
		$this->db->set('image_name',$image);
		$this->db->insert('lb_post_images');
	}
	
	public function addTestFAQPage()
	{
	    $this->db->set('post_id',$this->input->post('post_id'));
	    $this->db->set('faq_q',$this->input->post('faq_q'));
	    $this->db->set('faq_a',$this->input->post('faq_a'));
	    $this->db->set('status',1);
	    $this->db->insert('lb_post_faq');
	}
	public function updateTestFAQPage()
	{
	    $this->db->set('faq_q',$this->input->post('faq_q'));
	    $this->db->set('faq_a',$this->input->post('faq_a'));
	    $this->db->where('post_faq_id',$this->input->post('post_faq_id'));
	    $this->db->update('lb_post_faq');
	}
	public function getTestEditFaq($id)
	{
		$this->db->where('post_faq_id',$id);
		return $this->db->get('lb_post_faq')->row();
	}
	public function getTestFaqList($id)
	{
		$this->db->where('post_id',$id);
		return $this->db->get('lb_post_faq')->result();
	}
    public function commentlistshow()
    {
        $this->db->select('*');
        $this->db->where('status !=',3);
        $this->db->order_by('id','desc');
	    return $this->db->get('lb_blog_comment')->result();
    }
   
}