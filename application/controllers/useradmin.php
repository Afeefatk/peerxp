<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Useradmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
         $this->load->library('form_validation');
         $this->no_cache();
    }
protected function no_cache(){
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache'); 
}
    public function index() {
        $this->load->view('useradmin/login');
    }
    public function loadpages() {
       $page = $this->uri->segment('2');
   //exit();
        //  $slug = $this->uri->segment('2');
        //  $this->db->where('tn_id', urldecode($slug));
        //  $this->db->select('tbl_news');
        //   $this->db->last_query();
     // exit();
        $this->load->model('useradmin_model');  
         //load the method of model  
         // $data['h']=$this->useradmin_model->select(); 
         //  $data['s']=$this->useradmin_model->students(); 
    
        $this->load->view('useradmin/'.$page );
        
    }

 public function add_ticket() {

  $name=  $this->input->post('contact');
  $dep=  $this->input->post('dep');
  $cat=  $this->input->post('cat');
  $url=  $this->input->post('url');
  $sub=  $this->input->post('sub');
  $description=  $this->input->post('description');
  $email=  $this->input->post('email');
  $phone=  $this->input->post('phone');
   $priority=  $this->input->post('priority');
 $file = $_FILES['userfile']['name'];
       $fileName = time() . "." .date('Y-m-d'). "." .$file;

//$this->load->library('curl');
//$this->curl->simple_get('http://example.com/');
$url ='https://desk.zoho.com/api/v1/tickets
  -H "orgId:60005558783"
  -H "Authorization:Zoho-oauthtoken 97602a6d4a700fd0b09459a6cbad4337"
  -d {
 
  "Name" : "$name",
  "subject" : "$sub",
  
  "department" : "$dep",
  "category" : "$cat",
  "description" : "$description",
  "priority" : "priority",
  "Project URL" : "$url",
 
  "phone" : "$phone",
  "file"  : "$fileName",
  "email" : "$email",
  "status" : "Open"
}';

$postData= array(
           "Name" => $name,
  "subject" => $sub,
  
  "department" => $dep,
  "category" => $cat,
  "description" => $description,
  "priority" => $priority,
  "Project URL" => $url,
 
  "phone" => $phone,
  "file"  => $fileName,
  "email" => $email,
  "status" => "Open"
        );

$File = new \CURLFile('@/path/to/.$fileName'); //<-- Path could be relative
$data = array('name' => 'attachedfile', 'file' => $File);

 $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
     curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output=curl_exec($ch);

        curl_close($ch);

       // return $output;
        if(function_exists('curl_init') === true){
   //echo "curl_init is  defined";
    //cURL not enabled
}
      
     if($output)
        {
           $message1="Ticket Created successfully";
           $this->session->set_userdata('message1', $message1);
       }
 
 redirect('useradmin/addticket');
 }


     



  
     public function login() {
        $this->useradmin_model->login();
     }
     public function forgotpassword() {
        $this->useradmin_model->forgotpassword();
     }

     
     
      public function logout() {
        $this->useradmin_model->logout();
     }
}