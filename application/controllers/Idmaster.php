<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idmaster extends CI_Controller {

  public function details ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id =$this->session->userdata('Client')->id;
          $data['result']=$this->Model->selectIDMasterlist($client_id);
          $this->load->view('admin/Idmaster/idmaster',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }

  public function addIdmaster()
  {  
   if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            
          
             $id = $this->session->userdata('Client')->id;
            $whereData  = array('client_id' =>$id);
            $data['Party'] = $this->Model->selectAllById('Party', $whereData);
            $data['Exchange']=$this->Model->selectAllById('Exchange',$whereData);
            $this->load->view('admin/Idmaster/addIdmaster',$data);
            $this->load->view('admin/assets/footer');
        }else{
            redirect('Client');
        }
  }
  function check_user() {
    $user_name = $this->input->post('user_name');// get first name
    $exch_code = $this->input->post('exch_code');// get first name
 
    $this->db->from('Idmaster');
    $this->db->where('exch_code',$exch_code);
    $this->db->where('user_name',$user_name);
    $this->db->where('client_id',$this->session->userdata('Client')->id);
    $query = $this->db->get();

    $num = $query->num_rows();
    if ($num > 0) {
        $this->form_validation->set_message('check_user', 'Such User name with below exchange already exist!');
            return FALSE;
    } else {
        return TRUE;
    }
}
  public Function addIdmasterdetails()
  {
           $this->form_validation->set_rules('user_name', 'User Name', 'required|callback_check_user');// call callback function

           // $this->form_validation->set_rules('party_code', 'Party Code', 'required|is_unique[Party.party_code]|max_length[8]|alpha_numeric');
           if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
              $data['Party']=$this->Model->select('Party','updated_at desc');
            $data['Exchange']=$this->Model->select('Exchange','updated_at desc');
            $this->load->view('admin/Idmaster/addIdmaster',$data);
            $this->load->view('admin/assets/footer');
          } else {
            $data = array(
                'user_name'    => $this->input->post('user_name'),
                'party_code'    => $this->input->post('party_code'),
                'exch_code'     => $this->input->post('exch_code'),
                'rate'     => $this->input->post('rate'),
                'commision'         => $this->input->post('commision'),
                'commision_type'         => $this->input->post('commision_type'),
                'commision_ac'         => $this->input->post('commision_ac'),
                'client_id'     => $this->session->userdata('Client')->id,
                'partner_code'        => $this->input->post('partner_code'),
                'partnership_type'         => $this->input->post('partnership_type'),
                'partnership_rate'    => $this->input->post('partnership_rate'),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
                'status'        => 1
            );
            
            $result = $this->Model->insert($data,'Idmaster');
            if ($result) {
                $this->session->set_flashdata('AddIdmaster', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Idmaster Details Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Idmaster/details');
                
            } else {
                
                $this->session->set_flashdata('AddIdmaster', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Idmaster Not Added!!</strong>.
                </div>');
                
                redirect('Idmaster/details');
                
            }

          }
  }

  public function editIdmaster($id)
  {
        if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $whereData  = array('id' =>$id);
          $data['records'] = $this->Model->selectAllById('Idmaster', $whereData);
            $id = $this->session->userdata('Client')->id;
            $whereData  = array('client_id' =>$id);
            $data['Party'] = $this->Model->selectAllById('Party', $whereData);
            $data['Exchange']=$this->Model->selectAllById('Exchange',$whereData);
          $this->load->view('admin/Idmaster/editIdmaster', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('Client');
        }
  }

  public function editIdmasterdetails()
  {    
         
        if ($this->session->userdata('Client')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );

                $data = array(
                'user_name'    => $this->input->post('user_name'),
                'party_code'    => $this->input->post('party_code'),
                'exch_code'     => $this->input->post('exch_code'),
                'rate'     => $this->input->post('rate'),
                'commision'         => $this->input->post('commision'),
                'commision_type'         => $this->input->post('commision_type'),
                'commision_ac'         => $this->input->post('commision_ac'),
                'partner_code'        => $this->input->post('partner_code'),
                'partnership_type'         => $this->input->post('partnership_type'),
                'partnership_rate'    => $this->input->post('partnership_rate'),
                'updated_at'    => date("Y-m-d H:i:s")
                
            );
            

            
            
            $result = $this->Model->update($wheredata,'Idmaster',$data);
            if ($result) {
                $this->session->set_flashdata('UpadteIdmaster', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>ID Master Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Idmaster/details');
                
            } else {
                
                $this->session->set_flashdata('UpadteIdmaster', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>ID Master Record Not Updateed !!</strong>.
        </div>');
                
               redirect('Idmaster/details');
                
            }
        } else {
            redirect('Client');
        }
        
  }

  public function deleterecord($id, $tbl, $rd)
  {

      if ($this->session->userdata('Client')) {
        $wheredata    = array(
            'id' => $id,
            'status'  =>0
        );
        $result=$this->Model->selectAllById($tbl, $wheredata);
         if($result){
           $data = $this->Model->deleterec($wheredata, $tbl);
            if($data){
              $this->session->set_flashdata('deleteIdmaster', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>ID Master Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Idmaster/'.$rd);
        }else {
              $this->session->set_flashdata('deleteIdmaster', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>ID Master Record Not Deleted!!</strong>.
              </div>');
              redirect('Idmaster/'.$rd);
         }}else{
          $this->session->set_flashdata('deleteIdmaster', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active ID Master !!</strong>.
        </div>');
        redirect('Idmaster/'.$rd);
      } }else{
        redirect('Client');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Client')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Idmaster',$data);
        if ( $result){
            redirect('Idmaster/details');
          }else{
            redirect('Idmaster/details');
          }
      }else{
        redirect('Client');
      }
  }
 }
