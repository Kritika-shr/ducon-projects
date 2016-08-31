<?php
class Home extends CI_Controller
{
	public function __construct(){
		parent:: __construct();
		$this->load->model('home_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$this->load->view('template/index');
		
	}



	public function Register(){
	   $postdata = file_get_contents("php://input");
	   $request = json_decode($postdata);
	   $v = $this->home_model->userExistsCheck($request);
       if($v[0]->count == 0){
       	$d = $this->home_model->register_user($request);
       }else{
       	echo '0';
       }
	}

	public function Login(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$d = $this->home_model->login_user($request);
		echo json_encode($d);
	}

	public function Forgetpassword(){
	  $postdata = file_get_contents("php://input");
	  $request = json_decode($postdata);
	  $npass = $request->npass;
	  $cpass = $request->cpass;
	  $email = $request->email;
	  $id = $this->home_model->check_id($email);
	  if($id[0]->count !== '0'){
	  	 $this->check_password($npass, $cpass, $email );
	  }else{
	  	print "error1";
	  	//error message email ID not registered;
	  }
    } 

    public function check_password($npass, $cpass, $email){
    	if($npass === $cpass){
         $ar = $this->home_model->update_password($npass, $email);
         print "success";
       }else{
       	    print 'error2';//password Do not match
       }
    }  

}//class

?>