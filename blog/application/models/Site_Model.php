<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_Model extends CI_Model {
  function __construct()
    {
        parent::__construct();
    }
	
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
	public function getBlogListForHomecount()
	{
	     return $this->db->select('*')->where('post_status',1)->get('lb_blog_post')->num_rows();
	}
	public function getBlogListForHome($limit,$page)
	{
	     return $this->db->select('*')->where('post_status',1)->limit($limit,$page)->get('lb_blog_post')->result();
	}
	public function getSiteSetting()
	{
		$this->db->select('*');
		$this->db->where('setting_id',1);
		$getResult = $this->db->get('lb_site_setting');
		return $getResult->row(); 
	}
	public function getsinglepostdetails($url)
	{
		$this->db->select('*');
		$this->db->where('post_url',$url);
		return $this->db->get('lb_blog_post')->row();
	}
	public function getCatListForSiteallcat()
	{
		$this->db->select('*');
		$this->db->where('category_status',1);
		$this->db->where('category_parent_id',0);
		return $this->db->get('lb_blog_category_tb')->result();
	}
	public function  getCategoryPost($CatId)
	{
			$this->db->select("p.*");
			$this->db->join("lb_blog_category_post cp","cp.prod_id=p.post_id");
			$this->db->where("cp.cat_id",$CatId);
			$this->db->where('p.post_status',1);
			return $this->db->get("lb_blog_post p")->result(); 
	}
	public function getCategoryposts($limit,$page,$CatId)
	{
	
			$this->db->select("p.*");
			$this->db->join("lb_blog_category_post cp","cp.prod_id=p.post_id");
			$this->db->where("cp.cat_id",$CatId);
			$this->db->limit($limit,$page);
			$this->db->where('p.post_status',1);
			return $this->db->get("lb_blog_post p")->result();
	}
	 public function getCatDetailpost($url)
	{
		$this->db->select("*");
		$this->db->where("category_url",$url);
		return  $this->db->get("lb_blog_category_tb")->row();
	}
// 	comment
public function save_comment(){
    $todayDate = date("Y-m-d h:i:s");
    	    $this->db->set("blog_id",$this->input->post('post_id'));
    	    $this->db->set("user_email",$this->input->post('user_email'));
    	    $this->db->set("user_name",$this->input->post('user_name'));
    	    
			$this->db->set("comment_text",$this->input->post('comment'));
			$this->db->set("create_at",$todayDate);
			$this->db->insert("lb_blog_comment");
}
public function getmaincomment($post_id){
    $this->db->select("*");
		$this->db->where("blog_id",$post_id);
		$this->db->where('status',1);
		$this->db->where('parent_id','0');
		return  $this->db->get("lb_blog_comment")->result();
}
    public function getparentcomm($parent_id){
        $this->db->select("*");
    		$this->db->where("parent_id",$parent_id);
    		$this->db->where('status',1);
    		return  $this->db->get("lb_blog_comment")->result();
    }
        public function getcommentuser($id){
            $this->db->select("*");
        		$this->db->where("user_id",$id);
        		return  $this->db->get("lb_user_list")->row();
        }
        public function reply_comment(){
            $todayDate = date("Y-m-d h:i:s");
            	    $this->db->set("blog_id",$this->input->post('post_id_r'));
        			$this->db->set("user_email",$this->input->post('user_emaila'));
            	    $this->db->set("user_name",$this->input->post('user_namea'));
        			$this->db->set("comment_text",$this->input->post('comment_r'));
        			$this->db->set("parent_id",$this->input->post('comt_id_r'));
        			$this->db->set("status",0);
        			$this->db->set("create_at",$todayDate);
        			$this->db->insert("lb_blog_comment");
        }

	public function GetSearchdata()
	{
		$this->db->select("*");	
		$this->db->like('post_title',$this->input->get('q'));
		$this->db->or_like('meta_title',$this->input->get('q'));
		$this->db->or_like('meta_keyword',$this->input->get('q'));
		$query = $this->db->get("lb_blog_post"); 
		return $query->result();
	}
	    public function getrecentpost()
    {
        return $this->db->select('*')->where('post_status',1)->limit(5)->order_by('post_id','DESC')->get('lb_blog_post')->result();
    }
    
    public function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from('lb_blog_post'); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        // if(array_key_exists("search", $params)){ 
        //     // Filter data by searched keywords 
        //     if(!empty($params['search']['keywords'])){ 
        //         $this->db->like('post_title', $params['search']['keywords']); 
        //     } 
        // } 
         if(!empty($this->input->get('q'))){ 
                $this->db->like('post_title', $this->input->get('q')); 
            } 
         
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('post_title', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('post_id', 'desc'); 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("post_id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['post_id'])){ 
                    $this->db->where('post_id', $params['post_id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('post_id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
        // Return fetched data 
        return $result; 
    } 
    public function getRowsCat($params = array(),$id){ 
       
        $this->db->select("p.*");
		$this->db->join("lb_blog_category_post cp","cp.prod_id=p.post_id");
		$this->db->where("cp.cat_id",$id);
        $this->db->from('lb_blog_post p'); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("search", $params)){ 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords'])){ 
                $this->db->like('test_name', $params['search']['keywords']); 
            } 
        } 
         
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('test_name', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('post_id', 'desc'); 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("post_id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['post_id'])){ 
                    $this->db->where('post_id', $params['post_id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('post_id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
        // Return fetched data 
        return $result; 
    } 
    public function getReletedCat($postid)
    {
        $this->db->select('*');
        $this->db->where('prod_id',$postid);
        $cateData=$this->db->get('lb_blog_category_post')->result();
        
        if(!empty($cateData)){
            foreach($cateData as $data){
                $catD[]=$data->cat_id;
            }
           $catids= array_unique($catD);
           
            $this->db->select('*');
            $this->db->where_in('category_id',$catids);
            return $this->db->get('lb_blog_category_tb')->result();
        }else{
            return false;
        }
        
    }
    public function getTestFaqForView($url)
    {
    	$this->db->where('post_url',$url);
    	$testdata=$this->db->get('lb_blog_post')->row();

    	$this->db->where('post_id',$testdata->post_id);
    	return $this->db->get('lb_post_faq')->result();
    }
    public function getRelatedCagegoryPost($id)
	{
		$this->db->select('*');
		$this->db->where('prod_id',$id);
		$category_ids=$this->db->get('lb_blog_category_post')->result();
		if(!empty($category_ids)){
		    foreach ($category_ids as $key => $ae) {
				$catid[]=$ae->cat_id;
			}
			$catids=array_unique($catid);
			$this->db->select('*');
			$this->db->where_in('cat_id',$catids);
			$productids=$this->db->get('lb_blog_category_post')->result();
			if (!empty($productids)) {
				foreach ($productids as $key => $value) {
					$productid[]=$value->prod_id;
				}
				$product_id=array_unique($productid);
				$this->db->select('*');
				$this->db->where_in('post_id',$product_id);
				$this->db->order_by('rand()');
				$this->db->limit(10);
				return $this->db->get('lb_blog_post')->result();
			}else{
			    return false;
			}	
		}else{
		    return false;
		}
	}
	
	public function getRelatedCagegoryPostCount($id)
	{
			$this->db->select('*');
			$this->db->where('cat_id',$id);
			$productids=$this->db->get('lb_blog_category_post')->result();
			if (!empty($productids)) {
				foreach ($productids as $key => $value) {
					$productid[]=$value->prod_id;
				}
				$product_id=array_unique($productid);
				$this->db->select('*');
				$this->db->where_in('post_id',$product_id);
				return $this->db->get('lb_blog_post')->num_rows();
			}else{
			    return false;
			}	
	
	}


}