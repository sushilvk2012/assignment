<?php

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */



class BaseController extends CI_Controller
{

	public function __construct()
	{
		
		parent::__construct();
	  
      
	 	
	 	$this->data['headerInfo']['logo'] = base_url("/assets/logo.jpg");



	   
	}

	public function loadAdminWebViews($viewName = "", $param = NULL){

        $this->load->view('admin/shared/TopMenu', $param['headerInfo']);
        $this->load->view($viewName, $param['pageInfo']);
        $this->load->view('admin/shared/footer');
    }

  

    public function isLoggedIn()
    {
        $isLoggedIn = (bool)$this->session->isLoggedIn;

        if($isLoggedIn === false && is_login_url()==false)
        {
        	redirect(base_url('admin/login'));
        }else if($isLoggedIn === true && is_login_url()==true)
        {
        	redirect(base_url('admin/dashboard'));
        }
   
    }


}
