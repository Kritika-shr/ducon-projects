<?php
class Home_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function set_contact($request)
	{
		$data = array(
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        'ip_address' => $_SERVER['REMOTE_ADDR']
    	);
		print_r($data);
    	return $this->db->insert('contact_form', $data);
	}

    public function userExistsCheck($request){
        $check =$this->db->query("select count(id) as count from register_user where email='$request->email'");
        return $check->result();

    }
    public function register_user($request){
        $data = array(
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => md5($request->password)
        );

        return $this->db->insert('register_user', $data);
    }

     public function login_user($request){
       $password = md5($request->password);
       $userdetails = $this->db->query("SELECT * FROM register_user WHERE email = '$request->email' and password='$password' ");
       return $userdetails->result();
     }

     public function check_id($email){
        $emailCheck = $this->db->query("SELECT count(id) as count FROM register_user WHERE email = '$email' ");
        return $emailCheck->result();
     }

     public function update_password($npass, $email){
        $password = md5($npass);
        $data = array('password'=>$password);
        $this->db->where('email',$email);
        $this->db->update('register_user',$data);
        return $this->db->affected_rows();
        
     }



}