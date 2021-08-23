<?php

require APPPATH . '/controllers/BaseController.php';


class Company extends BaseController
{

	public function __construct()
    {
        parent::__construct();

     	$this->isLoggedIn();
  
    }

	public function index()
	{
	
		$this->data['headerInfo']['page_title'] = 'Company List';

		$list = $this->apiCall('', 'company');
      
       	$this->data['pageInfo']['lists'] = json_decode($list,true);

		$this->loadAdminWebViews('admin/company-list',$this->data);
	}


	public function add()
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		  
			
			$res = $this->apiCall($this->input->post(), 'company/add','post');
			
			$res = json_decode($res,true);
		
			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/company'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

			
		}

		$this->data['headerInfo']['page_title'] = 'Add Company';

       	$this->data['pageInfo']['form'] = array('title'=>'Add','action'=>'admin/company/add');


		$this->loadAdminWebViews('admin/company-form',$this->data);
	}



	public function edit($company_id)
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		
			$res = $this->apiCall($this->input->post(), 'company/edit/'.$company_id,'post');

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/company'));

			}else{

				$this->session->set_flashdata('message', $res);
			}
		}


		$list = $this->apiCall('','company/'.$company_id);

       	$this->data['pageInfo']['list'] = json_decode($list,true);

 
		$this->data['headerInfo']['page_title'] = 'Edit Company';

       	$this->data['pageInfo']['form'] = array('title'=>'Edit','action'=>'admin/company/edit/'.$company_id);


		$this->loadAdminWebViews('admin/company-form',$this->data);
	}

	public function delete($company_id)
	{

		if($this->input->server('REQUEST_METHOD')=="GET"){
		
			$res = $this->apiCall('','company/delete/'.$company_id);

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/company'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

		}

	}


}
