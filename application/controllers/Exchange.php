<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange extends CI_Controller {

  public function details ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id =$this->session->userdata('Client')->id;
          $data['result']=$this->Model->selectExchange($client_id);
          $this->load->view('admin/Exchange/Exchange',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }

  public function addExchange()
  {  
   if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $id = $this->session->userdata('Client')->id;
            $whereData  = array('client_id' =>$id);
            $data['party'] = $this->Model->selectAllById('Party', $whereData);
            // $data['party']=$this->Model->select('Party','updated_at desc');
            $this->load->view('admin/Exchange/addExchange',$data);
            $this->load->view('admin/assets/footer');
        }else{
            redirect('Client');
        }
  }
  function check_user() {
    $Exchange_code = $this->input->post('Exchange_code');// get first name
 
    $this->db->from('Exchange');
    $this->db->where('Exchange_Code',$Exchange_code);
    $this->db->where('client_id',$this->session->userdata('Client')->id);
    $query = $this->db->get();

    $num = $query->num_rows();
    if ($num > 0) {
        $this->form_validation->set_message('check_user', 'Such Exchange Code already exist!');
            return FALSE;
    } else {
        return TRUE;
    }
}
  public Function addExchangedetails()
  {         
                 $this->form_validation->set_rules('Exchange_code', 'Exchange Code', 'required|callback_check_user');// call callback function

           // $this->form_validation->set_rules('party_code', 'Party Code', 'required|is_unique[Party.party_code]|max_length[8]|alpha_numeric');
           if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
             $data['party']=$this->Model->select('Party','updated_at desc');
            $this->load->view('admin/Exchange/addExchange',$data);
            $this->load->view('admin/assets/footer');
          } else {
            

            $data = array(
                'Exchange_Code'    => $this->input->post('Exchange_code'),
                'Exchange_Name'    => $this->input->post('Exchange_name'),
                'Currancy'     => $this->input->post('Currancy'),
                'Upline_Code'     => $this->input->post('Upline_Code'),
                'Direct_Settle'         => $this->input->post('Direct_Settle'),
                'Settlement_ac'    => $this->input->post('Settlement_ac'),
                'Rate'        => $this->input->post('Rate'),
                'Commision'         => $this->input->post('Commision'),
                'commision_ac'    => $this->input->post('commision_ac'),
                'Comm_Type'    => $this->input->post('Comm_Type'),
                'client_id'     => $this->session->userdata('Client')->id,
                'status'        => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            
            $result = $this->Model->insert($data,'Exchange');
            if ($result) {
                $this->session->set_flashdata('AddExchange', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Exchange Details Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Exchange/details');
                
            } else {
                
                $this->session->set_flashdata('AddExchange', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Exchange Not Added!!</strong>.
                </div>');
                
                redirect('Exchange/details');
                
            }
          }
  }

  public function editExchange($id)
  {
        if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $whereData  = array('id' =>$id);
          $data['records'] = $this->Model->selectAllById('Exchange', $whereData);
         
            $id = $this->session->userdata('Client')->id;
            $whereData  = array('client_id' =>$id);
            $data['party'] = $this->Model->selectAllById('Party', $whereData);
          $this->load->view('admin/Exchange/editExchange', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('Client');
        }
  }

  public function editExchangedetails()
  {    
          
        if ($this->session->userdata('Client')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );

              $data = array(
                'Exchange_Name'    => $this->input->post('Exchange_name'),
                'Currancy'     => $this->input->post('Currancy'),
                'Upline_Code'     => $this->input->post('Upline_Code'),
                'Direct_Settle'         => $this->input->post('Direct_Settle'),
                'Settlement_ac'    => $this->input->post('Settlement_ac'),
                'Rate'        => $this->input->post('Rate'),
                'Commision'         => $this->input->post('Commision'),
                'commision_ac'    => $this->input->post('commision_ac'),
                'Comm_Type'    => $this->input->post('Comm_Type'),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            
            
            

            
            
            $result = $this->Model->update($wheredata,'Exchange',$data);
            if ($result) {
                $this->session->set_flashdata('UpadteExchange', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Exchange Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Exchange/details');
                
            } else {
                
                $this->session->set_flashdata('UpadteExchange', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Exchange Record Not Updateed !!</strong>.
        </div>');
                
               redirect('Exchange/details');
                
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
              $this->session->set_flashdata('deleteExchange', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Exchange Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Exchange/'.$rd);
        }else {
              $this->session->set_flashdata('deleteExchange', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Exchange Record Not Deleted!!</strong>.
              </div>');
              redirect('Exchange/'.$rd);
         }}else{
          $this->session->set_flashdata('deleteExchange', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active Exchange !!</strong>.
        </div>');
        redirect('Exchange/'.$rd);
      } }else{
        redirect('Client');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Client')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Exchange',$data);
        if ( $result){
            redirect('Exchange/details');
          }else{
            redirect('Exchange/details');
          }
      }else{
        redirect('Client');
      }
  }
 }
