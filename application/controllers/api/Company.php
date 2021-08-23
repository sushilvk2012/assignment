<?php


class Company extends CI_Controller
{

    private $json = array();

 
    public function __construct()
    {
       
        parent::__construct();

        $this->load->database();

    }

  
    public function index($id="")
    {
        

        if($id > 0 ){
            $this->db->where('company_id',$id);
        }

        $query = $this->db->get('company');

        $this->json = $id>0?$query->row_array():$query->result_array();

        echo json_encode($this->json);
           
        
 
    }

    public function add()
    {

        if($this->input->server('REQUEST_METHOD')=="POST"){

            $post_data = $this->security->xss_clean($this->input->post());
            $post_data['created_on'] = date('Y-m-d H:i:s');
      
            $this->db->insert('company',$post_data);

            $company_id = $this->db->insert_id();

            if($company_id){

                $this->json = array('type' => 'success','title' => 'Succes','msg' => 'Company has been created successfully.','status' => '200');

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
      
            $this->db->where('company_id',$id)->update('company',$post_data);

            $this->json = array('type' => 'success','title' => 'Succes','msg' => 'Company has been updated successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }


    public function get($product_id,$fun = false)
    {
       
       $result = $this->product_model->getProductDetails($product_id);
       if($fun){
        return $result;
       }else{
        echo  json_encode($result);
       }
        
    }

    public function delete($id)
    {

        if($this->input->server('REQUEST_METHOD')=="GET"){

            $id = $this->security->xss_clean($id);
           
      
            $this->db->where('company_id',$id)->delete('company');

            $this->json = array('type' => 'success','title' => 'Succes','msg' => 'Company has been deleted successfully.','status' => '200');
        }


        echo json_encode($this->json);

    }


  



}
