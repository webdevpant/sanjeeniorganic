<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __Construct()
	{ 
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Site_Model');
		$this->load->model('Admin_Model');
		$this->load->library('ajax_pagination'); 
		$this->perPage = 10; 
		$this->form_validation->set_message('is_unique', 'This Email is Already Registered');
		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size:13px;font-style: italic;margin-top:2px;margin-bottom:10px;text-align:left;color:red">', '</div>');
 		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-Store, no-cache, must-revalidate, post-check=0, pre-check=0');
 		$this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	public function checkSession()
	{
		$Logged_in=$this->session->userdata('isUserLogged_in'); 	
 	    if ($Logged_in == 0) { 		
 	        redirect(base_url('user-login.html'));
		}
	}
	public function index()
	{
		$data["meta_title"] = "";
		$data["meta_description"] = "";
		$data["meta_keywords"] = "";
		$data["canonical_url"] = base_url();
		$data["meta_author"] = base_url();
		
		
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->Site_Model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url(); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['blog_list'] = $this->Site_Model->getRows($conditions); 
		$this->load->view('site/index',$data);
	}
	function ajaxPaginationData(){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
         
        // Set conditions for search and filter 
        $keywords = $this->input->post('keywords'); 
        $sortBy = $this->input->post('sortBy'); 
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->Site_Model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('test-list.html'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['blog_list'] = $this->Site_Model->getRows($conditions); 
         
        // Load the data list view 
        $this->load->view('site/ajax-data', $data, false); 
    } 
	////////////////////Blog/////////////////////////////
	
	public function blogdetails($url)
	{
		$data['postdata'] = $this->Site_Model->getsinglepostdetails($url);
		if(empty($data['postdata'])){
		    redirect(base_url('404.html'));
		}
		//print_r($data['postdata']); die();	
		$data["meta_title"] = $data['postdata']->meta_title;
		$data["meta_description"] = $data['postdata']->meta_desc;
		$data["meta_keywords"] = $data['postdata']->meta_keyword;
		$data["canonical_url"] = base_url($url);
		$data["meta_author"] = base_url();
		$this->load->view('site/single-post',$data);
	}
	
	public function categorypost($url)
	{
		$catInfo = $this->Site_Model->getCatDetailpost($url);
		
		 //print_r($catInfo->category_id); die;
		


		//print_r($data['product_count']); die();
		
	
        
        $data = array(); 
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->Site_Model->getRowsCat($conditions,$catInfo->category_id); 
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url().'category/'.$url;
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['blog_list'] = $this->Site_Model->getRowsCat($conditions,$catInfo->category_id); 
        $data['cat_info'] = $catInfo;
        
        
        
        $data['meta_title'] =  $catInfo->category_name;
		$data['meta_description'] =  $catInfo->meta_desc;
		$data['meta_keywords'] =  $catInfo->meta_keyword;
		$data["canonical_url"] = base_url().'blog-category/'.$url;
        
		///////////////////pagination/////////////////////////
		$this->load->view('site/category_blog_list',$data);
	}
	function ajaxPaginationDatacat(){ 
        // Define offset 
        // print_r($_POST['url']);die;
        $catInfo = $this->Site_Model->getCatDetailpost($_POST['url']);
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
         
        // Set conditions for search and filter 
        $keywords = $this->input->post('keywords'); 
        $sortBy = $this->input->post('sortBy'); 
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->Site_Model->getRowsCat($conditions,$catInfo->category_id); 
        // $totalRec = $this->Site_Model->getRows($conditions); 
        //  print($totalRec);die;
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('test-list.html'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['blog_list'] = $this->Site_Model->getRowsCat($conditions,$catInfo->category_id); 
        // $data['blog_list'] = $this->Site_Model->getRows($conditions); 
         
        // Load the data list view 
        $this->load->view('site/ajax-data', $data, false); 
    } 
	
	/////////////////////End Blog///////////////////////
		//////////////////Comment start///////////////////
		
	public function commentsave()
	{	
	   // print_r($_POST);die();
		$this->form_validation->set_rules('post_id','post id','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('user_email','Please Enter Valid Email ID','trim|valid_email|required|xss_clean');
		$this->form_validation->set_rules('user_name','user_name','trim|required|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$array = array(
				    'error'   => true,
				    'comment_error' => 'Please Enter Valid Email ID',
				    'post_id_error' => form_error('post_id'),
			  	);
                echo json_encode($array);
			} 
			else {
		$dataa=$this->Site_Model->save_comment();
		$data['response']="Your Comment Is Awaiting Moderation.!!";
		$data['success']=$dataa;
		echo json_encode($data);
		}
	}
	public function replycommentsave()
	{
		// commentstart		
		$this->form_validation->set_rules('post_id_r','post id','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('comt_id_r','comt id','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('user_namea','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('user_emaila','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('comment_r','Comment','trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				    $array = array(
				    'error'   => true,
				    'comment_r_error' => form_error('comment_r'),
				    'post_id_r_error' => form_error('post_id_r'),
			  				 );
						    echo json_encode($array);
						    
			} 
			else {
		$dataa=$this->Site_Model->reply_comment();
		$data['response']="Your Comment Is Awaiting Moderation.!!";
		$data['success']=$dataa;
		echo json_encode($data);
		}
	}
	public function blogsearch(){
            $query = $this->input->get('q');
// 			$data['searchdata']=$this->Site_Model->GetSearchdata();

    
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->Site_Model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url(); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['blog_list'] = $this->Site_Model->getRows($conditions); 


			$data['querysearch'] = $this->input->get('q');
			$this->load->view('site/blogsearch',$data);
    }
	
	public function page404()
	{
	    $data["meta_title"] = "404 Page Not Found";
		$data["meta_description"] = "";
		$data["meta_keywords"] = "";
		$data["canonical_url"] = base_url();
		$data["meta_author"] = base_url();
		$this->load->view('site/404',$data);
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
	
	
	public function contact_Submit(){
	    $blog = 'Blog';
	    $this->db->set('contact_name',$this->input->post('name'));
	    $this->db->set('contact_email',$this->input->post('email'));
	    $this->db->set('contact_phone',$this->input->post('phone'));
	    $this->db->set('contact_message',$this->input->post('message'));
	    $this->db->set('from_website',$blog);
	    $this->db->insert('lb_contact_query');
	    $sessionData = array('message'  => 'Inquiry Submit Successfully !!');
	   // $sessionData = array('message'  => '<span class="text-success">Inquiry Submit Successfully !!</span>');
		$this->session->set_userdata($sessionData);
// 		header("Location:".base_url('Admin/commentlist/'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	

}
