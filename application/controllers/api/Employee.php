<?php


class Employee extends CI_Controller
{

    private $json = array();

 
    public function __construct()
    {
       
        parent::__construct();

        $this->load->database();

    }

  
    public function index($id="")
    {

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('company', 'company.company_id = employee.company_id');
        $this->db->join('department', 'department.department_id = employee.department_id');

        if($id > 0 ){
            $this->db->where('employee.emp_id',$id);
        }

        $query = $this->db->get();

        $this->json = $id>0?$query->row_array():$query->result_array();

        echo json_encode($this->json);
           
    
    }



    public function add()
    {

        if($this->input->server('REQUEST_METHOD')=="POST"){

            $post_data = $this->security->xss_clean($this->input->post());
            $post_data['created_on'] = date('Y-m-d H:i:s');
      
            $this->db->insert('employee',$post_data);

            $department_id = $this->db->insert_id();

            if($department_id){

                $this->json = array('type' => 'success','title' => 'Success','msg' => 'Employee has been created successfully.','status' => '200');

            }else{
                $this->json = array('type' => 'warning','title' => 'Warning','msg' => 'Something went wrong.','status' => '400');
            }

        }


        echo json_encode($this->json);

    }

    public function edit($id)
    {

        if($this->input->server('REQUEST_METHOD')=="POST"){

            $post_data = $this->security->xss_clean($this->input->post());
            $post_data['updated_on'] = date('Y-m-d H:i:s');

            $id = $this->security->xss_clean($id);
      
            $this->db->where('emp_id',$id)->update('employee',$post_data);

            $this->json = array('type' => 'success','title' => 'Success','msg' => 'Employee has been updated successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }



    public function delete($id)
    {

        if($this->input->server('REQUEST_METHOD')=="GET"){

            $id = $this->security->xss_clean($id);
           
      
            $this->db->where('employee_id',$id)->delete('employee');

            $this->json = array('type' => 'success','title' => 'Success','msg' => 'Employee has been deleted successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }


  



}
