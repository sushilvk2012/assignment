<?php


require APPPATH . '/controllers/BaseController.php';

class Home extends BaseController
{

	public function __construct()
    {
        parent::__construct();

     	$this->isLoggedIn();

    }

	public function login()
	{
	
		if($this->input->server('REQUEST_METHOD')=="POST"){
		
			$post_data = $this->security->xss_clean($this->input->post());

			// Static Credential for demo
			if($post_data['email'] == "admin@assignment.com" && md5($post_data['password']) == md5("admin@123")){

				$this->session->set_userdata(array('user_id'=>1,'isLoggedIn'=>true));

				redirect(base_url('admin/dashboard'));
			}else{
				
				$message =  array('type'  => 'warning','title' => 'Warning','msg'	=> 'Email or password mismatch!');

				$this->session->set_flashdata('message', $message);
			}

			
			
			
		}
		

		return $this->load->view('admin/login');
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
		redirect('admin/login'); 

	}


	public function dashboard()
	{
		

		$this->data['headerInfo']['page_title'] = 'Admin Dashboard';

       


		$this->loadAdminWebViews('admin/dashboard',$this->data);
	}
}
