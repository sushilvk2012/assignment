<?php

require APPPATH . '/controllers/BaseController.php';


class Employee extends BaseController
{

	public function __construct()
    {
        parent::__construct();

     	$this->isLoggedIn();
  
    }

	public function index()
	{
	
		$this->data['headerInfo']['page_title'] = 'Employee List';

		$list = $this->apiCall('', 'employee');
      
       	$this->data['pageInfo']['lists'] = json_decode($list,true);

		$this->loadAdminWebViews('admin/employee-list',$this->data);
	}


	public function add()
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		  
			
			$res = $this->apiCall($this->input->post(), 'employee/add','post');
			
			$res = json_decode($res,true);
		
			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/employee'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

			
		}

		$this->data['headerInfo']['page_title'] = 'Add Employee';

		$list = $this->apiCall('', 'company');

		$this->data['pageInfo']['companies'] = json_decode($list,true);

       	$this->data['pageInfo']['form'] = array('title'=>'Add','action'=>'admin/employee/add');


		$this->loadAdminWebViews('admin/employee-form',$this->data);
	}



	public function edit($emp_id)
	{


		if($this->input->server('REQUEST_METHOD')=="POST"){
		
			$res = $this->apiCall($this->input->post(), 'employee/edit/'.$emp_id,'post');

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/employee'));

			}else{

				$this->session->set_flashdata('message', $res);
			}
		}


		$list = $this->apiCall('','employee/'.$emp_id);

       	$this->data['pageInfo']['list'] = json_decode($list,true);


       	$companies = $this->apiCall('', 'company');
		$this->data['pageInfo']['companies'] = json_decode($companies,true);

		$employee = $this->apiCall('', 'employee');
		$this->data['pageInfo']['employee'] = json_decode($employee,true);

 
		$this->data['headerInfo']['page_title'] = 'Edit Employee';

       	$this->data['pageInfo']['form'] = array('title'=>'Edit','action'=>'admin/employee/edit/'.$emp_id);


		$this->loadAdminWebViews('admin/employee-form',$this->data);
	}

	public function delete($emp_id)
	{

		if($this->input->server('REQUEST_METHOD')=="GET"){
		
			$res = $this->apiCall('','employee/delete/'.$emp_id);

			$res = json_decode($res,true);

			if($res['status']==200){

				$this->session->set_flashdata('message',$res);

				redirect(base_url('admin/employee'));

			}else{

				$this->session->set_flashdata('message', $res);
			}

		}

	}


}
