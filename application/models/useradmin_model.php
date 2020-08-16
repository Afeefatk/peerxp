<?php
ob_start();
class useradmin_model extends CI_Model {

    function __construct() {
        parent::__construct();
          $this->db->cache_on();
    }
    function login() {
      //  session_start();
        $userName = $this->input->post('username');
       $password = $this->input->post('pass');
        // $query = $this->db->get_where('tbl_website', array('b_username' => $userName, 'b_password' => $password));
        $query = $this->db->get_where('tbl_login', array('Email' => $userName, 'Password' => $password));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $username = $row->Username;
                 $email = $row->Email;
                   $name = $row->Name;
                 $user = $row->UserId;
                  $this->session->set_userdata('userid', $user);
            }
           
               
                $this->load->view("useradmin/index");
           

        } else {
              $pagedata = array("data" => "Username or Password is incorrect");
           $message="Username or Password is incorrect";
             $this->session->set_userdata('message2', $message);
          redirect('useradmin'); //redirects to the admin page
        }
    }

     
     function forgotpassword() {
        $email = $this->input->post('email');
        $query = $this->db->get_where('tbl_website', array('Email' => $email));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $userName = $row->b_username;
                $password = $row->b_password;
            }
            $to = $email;
            $subject = 'Login details';
            $message = 'Hello user , Your credentials are given below <br/> <b>Username</b> :' . $userName . ' <br/> <b>Password </b>:' . $password . ' <br/> Click here to login :' . base_url() . 'useradmin/ ';
            $headers = 'From: info@fundsraja.com' . "\r\n" .
                    'Reply-To: info@fundsraja.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail($to, $subject, $message, $headers)) {
                
                 $message="Login details has been sent to your email";
           $this->session->set_userdata('message2', $message);
                redirect('useradmin'); //redirects to the admin page
            }
        } else {
           
            $message="The email you entered does not exist";
             $this->session->set_userdata('message2', $message);
            redirect('useradmin'); //redirects to the admin page
        }
    }

      function logout() {
        $this->session->unset_userdata('userid');
        session_destroy();
    redirect('useradmin'); 
        // $this->load->view("admin/indexadmin");
    }
    
   

}