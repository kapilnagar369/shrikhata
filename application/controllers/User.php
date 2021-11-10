<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function details ()
	{   
    if ($this->session->userdata('Myadmin')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $data['result']=$this->Model->select('users','created_at desc');
          $this->load->view('admin/user/details',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Executive');
      }
	}

	
  public function edituser($id)
  {
        if ($this->session->userdata('Myadmin')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $whereData  = array('id' =>$id);
          $data['records'] = $this->Model->selectAllById('users', $whereData);
          $this->load->view('admin/user/edituser', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('welcome');
        }
  }

  public function edituserdetails()
  {
        
        if ($this->session->userdata('Myadmin')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );
 
                $picture = '';
                $data = array(
              
                'email'       => ucfirst($this->input->post('email')),
                'password'       => ucfirst($this->input->post('password'))
                );
            
            
            
            $result = $this->Model->update($wheredata,'users',$data);
            if ($result) {
                $this->session->set_flashdata('Upadtecategory', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>User Record Update Sucessfully!!</strong>.
        </div>');
                
               redirect('User/details');
                
            } else {
                
                $this->session->set_flashdata('Upadtecategory', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>User Record Not Update !!</strong>.
        </div>');
                
               redirect('User/details');
                
            }
        } else {
            redirect('welcome');
        }
        
  }

  public function deleterecord($id, $tbl, $rd)
  {

      if ($this->session->userdata('Myadmin')) {
        $wheredata    = array(
            'id' => $id,
            'status'  =>0
        );
        $result=$this->Model->selectAllById($tbl, $wheredata);
         if($result){
           $data = $this->Model->deleterec($wheredata, $tbl);
            if($data){
              $this->session->set_flashdata('deletecat', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>User Record Delete Sucessfully!!</strong>.
              </div>');
              redirect('User/'.$rd);
        }else {
              $this->session->set_flashdata('deletecat', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>User Record Not Delete!!</strong>.
              </div>');
              redirect('User/'.$rd);
         }}else{
          $this->session->set_flashdata('deletecat', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active User !!</strong>.
        </div>');
        redirect('User/'.$rd);
      } }else{
        redirect('Welcome');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Myadmin')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);

        $result=$this->Model->update($wheredata,'users',$data);
        if ( $result){
            redirect('User/details');
          }else{
            redirect('User/details');
          }
      }else{
        redirect('Welcome');
      }
  }
    
}
