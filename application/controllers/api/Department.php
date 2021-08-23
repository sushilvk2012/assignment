<?php


class Department extends CI_Controller
{

    private $json = array();

 
    public function __construct()
    {
       
        parent::__construct();

        $this->load->database();

    }

  
    public function index($id="")
    {
        

        $this->db->select('department.*,company.company_name');
        $this->db->from('department');
        $this->db->join('company', 'company.company_id = department.company_id');

        if($id > 0 ){
            $this->db->where('department.department_id',$id);
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
      
            $this->db->insert('department',$post_data);

            $department_id = $this->db->insert_id();

            if($department_id){

                $this->json = array('type' => 'success','title' => 'Success','msg' => 'Department has been created successfully.','status' => '200');

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
      
            $this->db->where('department_id',$id)->update('department',$post_data);

            $this->json = array('type' => 'success','title' => 'Success','msg' => 'Department has been updated successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }



    public function delete($id)
    {

        if($this->input->server('REQUEST_METHOD')=="GET"){

            $id = $this->security->xss_clean($id);
           
      
            $this->db->where('department_id',$id)->delete('department');

            $this->json = array('type' => 'success','title' => 'Success','msg' => 'Department has been deleted successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }


  



}
