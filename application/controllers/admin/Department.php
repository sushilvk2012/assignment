<?php

require APPPATH . '/controllers/BaseController.php';


class Department extends BaseController
{

	public function __construct()
    {
        parent::__construct();

     	$this->isLoggedIn();
  
    }

	public function index()
	{
	
		$this->data['headerInfo']['page_title'] = 'Department List';

		$list = $this->apiCall('', 'department');
      
       	$this->data['pageInfo']['lists'] = json_decode($list,true);

		$this->loadAdminWebViews('admin/department-list',$this->data);
	}


	public function add()
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		  
			
			$res = $this->apiCall($this->input->post(), 'department/add','post');
			
			$res = json_decode($res,true);
		
			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/department'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

			
		}

		$this->data['headerInfo']['page_title'] = 'Add department';

		$list = $this->apiCall('', 'company');

		$this->data['pageInfo']['companies'] = json_decode($list,true);

       	$this->data['pageInfo']['form'] = array('title'=>'Add','action'=>'admin/department/add');


		$this->loadAdminWebViews('admin/department-form',$this->data);
	}



	public function edit($department_id)
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		
			$res = $this->apiCall($this->input->post(), 'department/edit/'.$department_id,'post');

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/department'));

			}else{

				$this->session->set_flashdata('message', $res);
			}
		}


		$list = $this->apiCall('','department/'.$department_id);

       	$this->data['pageInfo']['list'] = json_decode($list,true);


       	$companies = $this->apiCall('', 'company');

		$this->data['pageInfo']['companies'] = json_decode($companies,true);

 
		$this->data['headerInfo']['page_title'] = 'Edit Department';

       	$this->data['pageInfo']['form'] = array('title'=>'Edit','action'=>'admin/department/edit/'.$department_id);


		$this->loadAdminWebViews('admin/department-form',$this->data);
	}

	public function delete($department_id)
	{

		if($this->input->server('REQUEST_METHOD')=="GET"){
		
			$res = $this->apiCall('','department/delete/'.$department_id);

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/department'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

		}

	}


}
